<?php
declare(strict_types=1);

namespace Paycomet\Backoffice\Payments\Domain;

final class Payment
{
    private $id;
    private $paymentMethod;
    private $quantity;
    private $amount;
    private $currency;
    private $courseId;
    private $userId;

    public function __construct(
        PaymentId $id,
        PaymentMethod $paymentMethod,
        PaymentQuantity $quantity,
        PaymentAmount $amount,
        PaymentCurrency $currency,
        PaymentCourseId $courseId,
        PaymentUserId $userId
    )
    {
        $this->id = $id;
        $this->paymentMethod = $paymentMethod;
        $this->quantity = $quantity;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->courseId = $courseId;
        $this->userId = $userId;
    }

    public static function create(
        PaymentId $id,
        PaymentMethod $paymentMethod,
        PaymentQuantity $quantity,
        PaymentAmount $amount,
        PaymentCurrency $currency,
        PaymentCourseId $courseId,
        PaymentUserId $userId
    ): self
    {
        return new self($id, $paymentMethod, $quantity, $amount, $currency, $courseId, $userId);
    }

    public function id(): PaymentId
    {
        return $this->id;
    }

    public function paymentMethod(): PaymentMethod
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

    public function courseId(): PaymentCourseId
    {
        return $this->courseId;
    }

    public function userId(): PaymentUserId
    {
        return $this->userId;
    }
}
