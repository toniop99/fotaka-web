<?php


namespace Src\School\Exceptions;


use Src\shared\Domain\Exceptions\DomainError;

class SchoolNotFoundException extends DomainError
{
    protected $code = 1;

    public function errorCode(): string
    {
        return 'school_not_found';
    }

    protected function errorMessage(): string
    {
        return 'School could not be found.';
    }
}
