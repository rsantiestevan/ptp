<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Domain;

use Paycomet\Backoffice\Courses\Domain\CourseDetail;
use Paycomet\Backoffice\Courses\Domain\CourseId;
use Paycomet\Backoffice\Courses\Domain\CourseImage;
use Paycomet\Backoffice\Courses\Domain\CourseName;
use Paycomet\Backoffice\Courses\Domain\CoursePrice;

final class Payment
{
    private $id;
    private $paymentMethod;
    private $quantity;
    private $amount;
    private $currency;

    public function __construct(
        PaymentId $id,
        PaymentMethod $paymentMethod,
        PaymentQuantity $quantity,
        PaymentAmount $amount,
        PaymentCurrency $currency
    )
    {
        $this->id = $id;
        $this->paymentMethod = $paymentMethod;
        $this->quantity = $quantity;
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public static function create(
        PaymentId $id,
        PaymentMethod $paymentMethod,
        PaymentQuantity $quantity,
        PaymentAmount $amount,
        PaymentCurrency $currency
    ): self
    {
        $payment = new self($id, $paymentMethod, $quantity, $amount, $currency);
        return $payment;
    }

    public function id(): PaymentId
    {
        return $this->id;
    }

    public function name(): PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function quantity(): PaymentQuantity
    {
        return $this->quantity;
    }

    public function amount(): PaymentAmount
    {
        return $this->amount;
    }

    public function currency(): PaymentCurrency
    {
        return $this->currency;
    }
}
