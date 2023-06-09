<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Domain;

interface PayMethodType
{
    public function process(Payment $payment): bool;
}
