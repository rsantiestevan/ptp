<?php
declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Payment;

use Illuminate\Http\Request;
use Paycomet\Backoffice\Payments\Application\PaymentCreator;
use Paycomet\Backoffice\Payments\Infrastructure\Repositories\EloquentPaymentRepository;
use Paycomet\Backoffice\User\Infrastructure\Repositories\EloquentUserRepository;
use Paycomet\Backoffice\User\Application\UserFindOrCreate;

final class PaymentPostController extends \App\Http\Controllers\Controller
{

    public function __invoke(Request $request)
    {
        dd($request);
        /*
        $userFindOrCreate = new UserFindOrCreate(new EloquentUserRepository());
        $user = $userFindOrCreate($request->user_name, $request->user_email, $request->user_password);
        $paymentMethod = 'N/A';
        $paymentCreator = new PaymentCreator(new EloquentPaymentRepository());
        $paymentCreator(
            $paymentMethod,
            $request->quantity,
            $request->price,
            $request->currency,
            $request->course_id,
            $user->id()->value()
        );
        dd($request);
        */
    }
}
