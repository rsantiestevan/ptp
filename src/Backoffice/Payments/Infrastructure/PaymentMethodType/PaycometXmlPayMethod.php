<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Infrastructure\PaymentMethodType;

use Paycomet\Backoffice\Payments\Domain\Payment;
use Paycomet\Backoffice\Payments\Domain\PayMethodType;
final class PaycometXmlPayMethod implements PayMethodType
{
    private $payJetID;
    private $payMerchantCode;
    private $payTerminal;
    private $payPassword;

    private $token;
    private $endPoint;
    private $productDescription;
    private $owner;
    private $ip;
    private $order;

    public function __construct(string $token)
    {
        $this->payJetID             = env('PAY_JETID');
        $this->payMerchantCode      = env('PAY_MERCHANTCODE');
        $this->payTerminal          = env('PAY_TERMINAL');
        $this->payPassword          = env('PAY_PASSWORD');
        $this->token                = $token;#$_POST["paytpvToken"];
        $this->endPoint             = "https://api.paycomet.com/gateway/xml-bankstore?wsdl";
        $this->productDescription   = "XML_BANKSTORE TEST productDescription";
        $this->owner                = "XML_BANKSTORE TEST owner";
        $this->ip                   = $_SERVER["REMOTE_ADDR"];
        $this->order                = "MERCHANTORDER-" . date("Y/m/d h:I:s");
    }

    public function process(Payment $payment): bool
    {
        date_default_timezone_set("Europe/Madrid");
        $token = $this->token;
        if (!($token && strlen($token) == 64)) {
            var_dump("Error, no se ha obtenido token");
            return false;
        }
        $signature = hash("sha512",
            $this->payMerchantCode
            .$token
            .$this->payJetID
            .$this->payTerminal
            .$this->payPassword
        );

        try {
            $context = stream_context_create(array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            ));

            $clientSOAP = new SoapClient($this->endPoint, array('stream_context' => $context));
            $addUserTokenResponse = $clientSOAP->add_user_token(
                $this->payMerchantCode,
                $this->payTerminal,
                $token,
                $this->payJetID,
                $signature,
                $this->ip
            );

            if ($addUserTokenResponse["DS_ERROR_ID"] != "0") {
                var_dump("Error al obtener el token");
                var_dump($addUserTokenResponse["DS_ERROR_ID"]);
                return false;
            }

            // OK
            echo " Proceso correcto. Se ha obtenido el token";
            var_dump($addUserTokenResponse);

            $signature = hash("sha512",
                $this->payMerchantCode
                .$addUserTokenResponse["DS_IDUSER"]
                .$addUserTokenResponse["DS_TOKEN_USER"]
                .$this->payTerminal
                .$payment->price()->value()//$_POST["amount"]
                .$this->order
                .$this->payPassword
            );

            $executePurchaseResponse
                = $clientSOAP->execute_purchase(
                $this->payMerchantCode,
                $this->payTerminal,
                $addUserTokenResponse["DS_IDUSER"],
                $addUserTokenResponse["DS_TOKEN_USER"],
                $payment->price()->value(),//$_POST["amount"],
                $this->order,
                "EUR",
                $signature,
                $this->ip,
                $this->productDescription,
                $this->owner
            );

            if ($executePurchaseResponse["DS_RESPONSE"] == "1") {
                // OK
                var_dump("COMPRA CORRECTA");
                return true;
            } else {
                //KO
                var_dump("Error al obtener el ejecutar la compra");
                var_dump($executePurchaseResponse["DS_ERROR_ID"]);
                return false;
            }

            var_dump($executePurchaseResponse);
        } catch(Exception $e){
            var_dump($e);
        }
        return false;
    }
}
