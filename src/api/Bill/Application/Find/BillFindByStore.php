<?php

namespace Src\api\Bill\Application\Find;

use Src\api\Bill\Domain\BillRepository;
use Src\api\shared\Domain\StoreId;
use Src\api\UserApi\Domain\UserApi;
use Src\shared\Domain\Exceptions\UserApiCantRead;
use Src\shared\Domain\Exceptions\UserApiInactive;

final class BillFindByStore
{
    public function __construct(
        private BillRepository $repository,
        private UserApi        $userApi,
    )
    {
        if (!$this->userApi->active()->value()) {
            throw new UserApiInactive($this->userApi->id());
        }
        
        if (!$this->userApi->read()->value()) {
            throw new UserApiCantRead($this->userApi->id());
        }
    }

    public function __invoke(StoreId $id): array
    {
        return $this->repository->getByStore($id);
    }
}
