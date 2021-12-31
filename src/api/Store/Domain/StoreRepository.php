<?php

namespace Src\api\Store\Domain;

use Src\shared\Domain\ValueObject\Uuid;

interface StoreRepository
{
    public function save(Store $store): void;

    public function getAll(): array;

    public function delete(Uuid $id): void;
}
