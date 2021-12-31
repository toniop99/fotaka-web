<?php

namespace Src\api\UserApi\Domain;

use Src\api\UserApi\Domain\UserApi;
use Src\shared\Domain\ValueObject\Uuid;

interface UserApiRepository
{
    public function find(Uuid $id): ?UserApi;

    public function findByToken(Token $token): ?UserApi;

    public function edit(UserApi $userApi): void;
}
