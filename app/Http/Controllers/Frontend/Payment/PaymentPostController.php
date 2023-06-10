<?php
declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Payment;

use Illuminate\Http\Request;
use Paycomet\Backoffice\Payments\Application\PaymentCreator;
use Paycomet\Backoffice\Payments\Application\ProcessPayment;
use Paycomet\Backoffice\Payments\Infrastructure\PaymentMethodType\PaycometRestPayMethod;
use Paycomet\Backoffice\Payments\Infrastructure\PaymentMethodType\PaycometXmlPayMethod;
use Paycomet\Backoffice\Payments\Infrastructure\Repositories\EloquentPaymentRepository;
use Paycomet\Backoffice\User\Infrastructure\Repositories\EloquentUserRepository;
use Paycomet\Backoffice\User\Application\UserFindOrCreate;

final class PaymentPostController extends \App\Http\Controllers\Controller
{

    public function __invoke(Request $request)
    {
        $userFindOrCreate = new UserFindOrCreate(new EloquentUserRepository());
        $user = $userFindOrCreate($request->user_name, $request->user_email, $request->user_password);
        $paymentMethod = 'N/A';
        #payment process By XML
        //$payProcess = new ProcessPayment(new PaycometXmlPayMethod($request->paytpvToken));
        #payment process By Rest
        $payProcess = new ProcessPayment(new PaycometRestPayMethod(
            '',
            $request->username,
            $request->pan,
            $request->dateMonth,
            $request->dateYear,
            $request->cvc2
        ));
        $isPaymentNull = $payProcess(
            $paymentMethod,
            $request->quantity,
            $request->price,
            $request->currency,
            $request->course_id,
            $user->id()->value()
        );
        #payment creator
        if (!is_null($isPaymentNull)) {
            $paymentCreator = new PaymentCreator(new EloquentPaymentRepository());
            $paymentCreator($isPayment);
            return view('payment.ok');
        }
        return view('payment.notok');

    }
}
