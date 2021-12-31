<?php

namespace Src\api\Store\Application\Save;

use Src\api\Store\Domain\Store;
use Src\api\Store\Domain\StoreRepository;
use Src\api\UserApi\Domain\UserApi;
use Src\shared\Domain\Exceptions\UserApiCantWrite;
use Src\shared\Domain\Exceptions\UserApiInactive;

final class StoreSave
{
    public function __construct(
        private StoreRepository $repository,
        private UserApi         $userApi,
    )
    {
        if (!$this->userApi->active()->value()) {
            throw new UserApiInactive($this->userApi->id());
        }

        if (!$this->userApi->write()->value()) {
            throw new UserApiCantWrite($this->userApi->id());
        }
    }

    public function __invoke(Store $store): void
    {
        $this->repository->save($store);
    }
}

