<?php

namespace Src\api\Bill\Infrastructure;

use Src\api\Bill\Domain\Bill;
use App\Models\Bill as BillEloquentModel;
use Src\api\Bill\Domain\BillRepository;
use Src\api\shared\Domain\StoreId;
use Src\shared\Domain\ValueObject\Uuid;

final class EloquentBillRepository implements BillRepository
{
    public function save(Bill $bill): void
    {
        $model = new BillEloquentModel();

        $model::query()->updateOrCreate([
            'id' => $bill->id()->value()
        ], [...$bill->toPrimitives(), 'updated_at' => now()]);
    }

    public function getAll(): array
    {
        $model = new BillEloquentModel();

        return $model::query()->get()->map(function ($bill) {
            return Bill::fromPrimitives($bill->toArray());
        })->toArray();
    }

    public function getByStore(StoreId $id): array
    {
        $model = new BillEloquentModel();

        return $model->query()->where('store_id', $id->value())->get()->map(function ($bill) {
            return Bill::fromPrimitives($bill->toArray());
        })->toArray();
    }

    public function delete(Uuid $id): void
    {
        $model = new BillEloquentModel();
        $model->query()->where('id', $id->value())->delete();
    }
}
