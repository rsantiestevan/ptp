<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Infrastructure\PaymentMethodType;

use Paycomet\Backoffice\Payments\Domain\Payment;

final class PaycometRestPayMethod implements \Paycomet\Backoffice\Payments\Domain\PayMethodType
{
    public function __construct(string $token)
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
    }
    public function process(Payment $payment): boolean
    {
        $headers = ['headers' => ['PAYCOMET-API-TOKEN' => $this->payApiKey]];
        $client = new \GuzzleHttp\Client($headers);
        $myBody['name'] = "Demo";
        $request = $client->post(
            $this->endPoint,  [ 'body'=>$this->getBody($payment) ]);
        $request->addHeader('','');
        $response = $request->send();

        dd($response);
    }

    private function getBody(Paymen $payment): array
    {
        $datos['terminal'] = $this->payTerminal;
        $datos['cvc2'] = '';
        $datos['jetToken'] = $this->token;
        $datos['expiryYear'] = '';
        $datos['expiryMonth'] = '';
        $datos['pan'] = '';
        $datos['order'] = $this->order;
        $datos['productDescription'] = '';
        $datos['language'] = 'es';
        $datos['notify'] = '2';
        $datos['cardHolderName'] = '';
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
    }
}
