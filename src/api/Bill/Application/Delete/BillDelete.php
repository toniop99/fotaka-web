<?php

namespace Src\api\Bill\Application\Delete;

use Src\api\Bill\Domain\BillId;
use Src\api\Bill\Domain\BillRepository;
use Src\api\UserApi\Domain\UserApi;
use Src\shared\Domain\Exceptions\UserApiCantWrite;
use Src\shared\Domain\Exceptions\UserApiInactive;

final class BillDelete
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
            throw new UserApiCantWrite($this->userApi->id());
        }
    }

    public function __invoke(BillId $id)
    {
        $this->repository->delete($id);
    }
}
