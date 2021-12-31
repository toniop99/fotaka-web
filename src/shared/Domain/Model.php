<?php

namespace Src\shared\Domain;

use JsonSerializable;

abstract class Model implements JsonSerializable
{
    abstract public function toPrimitives(): array;

    abstract public static function fromPrimitives(array $primitives): self;

    public function jsonSerialize(): array
    {
        return $this->toPrimitives();
    }
}
