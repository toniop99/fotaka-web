<?php

namespace Src\shared\Domain\Exceptions;

use Src\shared\Domain\Exceptions\DomainError;
use Src\shared\Domain\ValueObject\Uuid;

final class UserApiInactive extends DomainError
{
    public function __construct(private Uuid $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'userApi_inactive';
    }

    protected function errorMessage(): string
    {
        return sprintf('The userApi <%s> is inactive', $this->id->value());
    }
}
