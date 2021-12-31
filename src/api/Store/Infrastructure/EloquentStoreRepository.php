<?php

namespace Src\api\Store\Infrastructure;

use App\Models\Store as StoreEloquentModel;
use Src\api\Store\Domain\Store;
use Src\api\Store\Domain\StoreRepository;
use Src\shared\Domain\ValueObject\Uuid;

final class EloquentStoreRepository implements StoreRepository
{
    public function save(Store $store): void
    {
        $model = new StoreEloquentModel();

        $model::query()->updateOrCreate([
            'id' => $store->id()->value()
        ], $store->toPrimitives());
    }

    public function getAll(): array
    {
        $model = new StoreEloquentModel();

        return $model::query()->get()->map(function($store) {
            return Store::fromPrimitives($store->toArray());
        })->toArray();
    }

    public function delete(Uuid $id): void
    {
        $model = new StoreEloquentModel();
        $model->query()->where('id', $id->value())->delete();
    }
}
