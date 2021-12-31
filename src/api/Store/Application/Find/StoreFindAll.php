<?php

namespace Src\api\Store\Application\Find;

use Src\api\Store\Domain\StoreRepository;
use Src\api\UserApi\Domain\UserApi;
use Src\api\UserApi\Domain\UserApiRepository;
use Src\shared\Domain\Exceptions\UserApiCantRead;
use Src\shared\Domain\Exceptions\UserApiInactive;

final class StoreFindAll
{
    public function __construct(
        private StoreRepository $repository,
        private UserApi         $userApi,
    )
    {
        if (!$this->userApi->active()->value()) {
            throw new UserApiInactive($this->userApi->id());
        }

        if (!$this->userApi->read()->value()) {
            throw new UserApiCantRead($this->userApi->id());
        }
    }

    public function __invoke(): array
    {
        return $this->repository->getAll();
    }

}
