<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Infrastructure\PaymentMethodType;

use Paycomet\Backoffice\Payments\Domain\Payment;
use Paycomet\Backoffice\Payments\Domain\PayMethodType;

final class PaycometRestPayMethod implements PayMethodType
{
    private $username;
    private $pan;
    private $dateMonth;
    private $dateYear;
    private $cvc2;

    public function __construct(string $token, string $username, string $pan,
        string $dateMonth,
        string $dateYear,
        string $cvc2
    )
    {
        $this->payJetID             = env('PAY_JETID');
        $this->payMerchantCode      = env('PAY_MERCHANTCODE');
        $this->payTerminal          = env('PAY_TERMINAL');
        $this->payPassword          = env('PAY_PASSWORD');
        $this->payApiHash           = env('PAY_API_HASH');
        $this->payApiKey            = env('PAY_API_KEY');
        $this->token                = $token;#$_POST["paytpvToken"];
        $this->endPoint             = "https://rest.paycomet.com/v1/cards";

        $this->productDescription   = "XML_BANKSTORE TEST productDescription";
        $this->owner                = "XML_BANKSTORE TEST owner";
        $this->ip                   = $_SERVER["REMOTE_ADDR"];
        $this->order = "MERCHANTORDER-" . date("Y/m/d h:I:s");
        $this->username = $username;
        $this->pan = $pan;
        $this->dateMonth = $dateMonth;
        $this->dateYear = $dateYear;
        $this->cvc2 = $cvc2;
    }
    public function process(Payment $payment): bool
    {
        $headers = ['headers' => ['PAYCOMET-API-TOKEN' => $this->payApiKey]];
        $client = new \GuzzleHttp\Client($headers);
        $options = [
            'debug' => true,
            'form_params' => $this->getBody($payment),
        ];
        $request = $client->post($this->endPoint, $options);
        $request->addHeader('','');
        $response = $request->send();

        var_dump($response);
    }

    private function getBody(Payment $payment): array
    {
        $datos['terminal'] = $this->payTerminal;
        $datos['cvc2'] = $this->cvc2;
        $datos['jetToken'] = $this->token;
        $datos['expiryYear'] = $this->dateYear;
        $datos['expiryMonth'] = $this->dateMonth;
        $datos['pan'] = $this->pan;
        $datos['order'] = $this->order;
        $datos['productDescription'] = '';
        $datos['language'] = 'es';
        $datos['notify'] = '2';
        $datos['cardHolderName'] = $this->username;
        $datos['secureAuthentication'] = [
            'CAVV' => '',
            'TXID' => '',
            'ECI' => '',
            'threeDSServerTransID' => '',
            'authenticacionValue' => '',
            'dsTransID' => '',
            'threeDSVersion' => '',
            'authenticationFlow' => '',
        ];
        return $datos;
    }
}
