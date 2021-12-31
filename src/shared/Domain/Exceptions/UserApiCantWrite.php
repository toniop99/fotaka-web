<?php

namespace Src\shared\Domain\Exceptions;

use Src\shared\Domain\Exceptions\DomainError;
use Src\shared\Domain\ValueObject\Uuid;

final class UserApiCantWrite extends DomainError
{
    public function __construct(private Uuid $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'userApi_cant_write';
    }

    protected function errorMessage(): string
    {
        return sprintf('The userApi <%s> doesnt have write permissions', $this->id->value());
    }
}
