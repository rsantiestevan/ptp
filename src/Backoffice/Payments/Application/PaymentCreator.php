<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Application;

use Paycomet\Backoffice\Payments\Domain\Payment;
use Paycomet\Backoffice\Payments\Domain\PaymentId;
use Paycomet\Backoffice\Payments\Domain\PaymentMethod;
use Paycomet\Backoffice\Payments\Domain\PaymentQuantity;
use Paycomet\Backoffice\Payments\Domain\PaymentAmount;
use Paycomet\Backoffice\Payments\Domain\PaymentCurrency;
use Paycomet\Backoffice\Payments\Domain\PaymentCourseId;
use Paycomet\Backoffice\Payments\Domain\PaymentUserId;

use Paycomet\Backoffice\Payments\Domain\PaymentRepository;

final class PaymentCreator
{
    private $repository;

    public function __construct(PaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Payment $payment)
    {
        $this->repository->save($payment);
    }

}
