<?php

namespace Src\api\Bill\Domain;

use Src\api\shared\Domain\StoreId;
use Src\shared\Domain\Model;
use Src\shared\Domain\ValueObject\Uuid;

final class Bill extends Model
{
    public function __construct(
        private BillId $id,
        private StoreId $storeId,
        private Value $value,
    ) {}

    public function toPrimitives(): array
    {
        return [
            'id'       => $this->id->value(),
            'store_id'     => $this->storeId->value(),
            'value' => $this->value->value(),
        ];
    }

    public static function fromPrimitives(array $primitives): Bill
    {
        return new self(new BillId($primitives['id']), new StoreId($primitives['store_id']), new Value($primitives['value']));
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function storeId(): Uuid
    {
        return $this->storeId;
    }

    public function value(): Value
    {
        return $this->value;
    }
}
