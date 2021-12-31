<?php

namespace Src\api\Bill\Application\Create;

use Src\api\Bill\Domain\Bill;
use Src\api\Bill\Domain\BillRepository;
use Src\api\UserApi\Domain\UserApi;
use Src\shared\Domain\Exceptions\UserApiCantWrite;
use Src\shared\Domain\Exceptions\UserApiInactive;

final class BillCreate
{
    public function __construct(
        private BillRepository $repository,
        private UserApi        $userApi,
    )
    {
        if (!$this->userApi->active()->value()) {
            throw new UserApiInactive($this->userApi->id());
        }

        if (!$this->userApi->write()->value()) {
            throw new UserApiCantWrite($this->userApi->id());
        }
    }

    public function __invoke(Bill $bill)
    {
        $this->repository->save($bill);
    }
}
