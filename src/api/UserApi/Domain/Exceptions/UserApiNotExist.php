<?php

namespace Src\api\UserApi\Domain\Exceptions;

use Src\shared\Domain\Exceptions\DomainError;
use Src\shared\Domain\ValueObject\Uuid;

final class UserApiNotExist extends DomainError
{
    public function __construct(private Uuid $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'userApi_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The userApi <%s> does not exist', $this->id->value());
    }
}
