<?php

namespace Src\api\UserApi\Infrastructure;

use Src\api\UserApi\Domain\UserApi;
use App\Models\ApiUser as ApiUserEloquentModel;
use Src\api\UserApi\Domain\Token;
use Src\api\UserApi\Domain\UserApiRepository;
use Src\shared\Domain\ValueObject\Uuid;

final class EloquentUserApiRepository implements UserApiRepository
{
    public function find(Uuid $id): ?UserApi
    {
        $model = new ApiUserEloquentModel();

        $result = $model::query()->where('id', $id->value())->get()->first;

        if (!$result) {
            return null;
        }

        return UserApi::fromPrimitives($result->toArray());
    }

    public function findByToken(Token $token): ?UserApi
    {
        $model = new ApiUserEloquentModel();
        $result = $model::query()->where('token', $token->value())->get()->first();

        if (!$result) {
            return null;
        }

        return UserApi::fromPrimitives($result->toArray());
    }

    public function edit(UserApi $userApi): void
    {
        $model = new ApiUserEloquentModel();

        $model::query()->where('id', $userApi->id()->value())->update($userApi->toPrimitives());
    }
}
