<?php


namespace Src\Grade;


use Src\shared\Domain\Exceptions\DomainError;

class GradeNotFoundException extends DomainError
{
    protected $code = 2;

    public function errorCode(): string
    {
        return 'class_not_found';
    }

    protected function errorMessage(): string
    {
        return 'Class could not be found.';
    }
}
