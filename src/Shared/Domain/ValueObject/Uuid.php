<?php
declare(strict_types=1);

namespace Paycomet\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    protected $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);

        $this->value = $value;
    }

    public static function random(): self
    {
        return new self((string) RamseyUuid::uuid4());
    }

    public function value(): string
    {
        return $this->value;
    }

    private function ensureIsValidUuid($id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new \Exception(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }

    public function equals(Uuid $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString()
    {
        return $this->value();
    }
}
