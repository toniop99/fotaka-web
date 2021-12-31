<?php

namespace Src\shared\Domain\ValueObject;

abstract class BooleanValueObject
{
    protected bool $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value() ? 'true' : 'false';
    }
}
