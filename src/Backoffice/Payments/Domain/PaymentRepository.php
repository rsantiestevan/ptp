<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Domain;

use Paycomet\Backoffice\Payments\Domain\Payment;

interface PaymentRepository
{
    public function save(Payment $payment): void;

}
