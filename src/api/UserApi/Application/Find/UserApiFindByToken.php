<?php

namespace Src\api\UserApi\Application\Find;

use Src\api\UserApi\Domain\Exceptions\UserApiNotExist;
use Src\api\UserApi\Domain\Token;
use Src\api\UserApi\Domain\UserApi;
use Src\api\UserApi\Domain\UserApiRepository;

final class UserApiFindByToken
{
    public function __construct(
        private UserApiRepository $repository,
    )
    {
    }

    public function __invoke(Token $id): UserApi
    {
        $userApi = $this->repository->findByToken($id);

        if ($userApi === null) {
            throw new UserApiNotExist($id);
        }

        return $userApi;
    }
}
