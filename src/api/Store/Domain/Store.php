<?php

namespace Src\api\Store\Domain;

use JsonSerializable;
use Src\api\shared\Domain\StoreId;
use Src\shared\Domain\Model;
use Src\shared\Domain\ValueObject\Uuid;

final class Store extends Model
{
    public function __construct(
        private StoreId $id,
        private Name $name,
    ) {}

    public function toPrimitives(): array
    {
        return [
            'id'       => $this->id->value(),
            'name' => $this->name->value(),
        ];
    }

    public static function fromPrimitives(array $primitives): Store
    {
        return new self(new StoreId($primitives['id']), new Name($primitives['name']));
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }


}
