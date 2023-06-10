<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Infrastructure\Repositories;

use Paycomet\Backoffice\Payments\Domain\PaymentRepository;
use Paycomet\Backoffice\Payments\Domain\Payment;

use Paycomet\Backoffice\Payments\Infrastructure\Repositories\Models\Payment as EloquentPaymentModel;
final class EloquentPaymentRepository implements PaymentRepository
{
    private $eloquentCourseModel;

    public function __construct()
    {
        $this->eloquentCourseModel = new EloquentPaymentModel;
    }

    public function save(Payment $payment): void
    {
        $newPayment = $this->eloquentCourseModel;
        $data = [
            'id'                => $payment->id()->value(),
            'payment_method'    => $payment->paymentMethod()->value(),
            'quantity'          => $payment->quantity()->value(),
            'amount'            => $payment->amount()->value(),
            'currency'          => $payment->currency()->value(),
            'course_id'          => $payment->courseId()->value(),
            'user_id'          => $payment->userId()->value(),
        ];

        $newPayment->create($data);
    }

}
