<?php
declare(strict_types=1);

use Paycomet\Backoffice\Payments\Domain\Payment;

use Paycomet\Backoffice\Payments\Infrastructure\Models\Payment as EloquentPaymentModel;
final class EloquentPaymentRepository implements \Paycomet\Backoffice\Payments\Domain\PaymentRepository
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
        ];

        $newPayment->create($data);
    }

}
