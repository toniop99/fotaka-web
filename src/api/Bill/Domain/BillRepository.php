<?php

namespace Src\api\Bill\Domain;

use Src\api\shared\Domain\StoreId;

interface BillRepository
{
    public function save(Bill $bill): void;

    public function getAll(): array;

    public function getByStore(StoreId $id): array;

    public function delete(BillId $id): void;
}
