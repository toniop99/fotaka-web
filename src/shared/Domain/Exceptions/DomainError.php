<?php


namespace Src\shared\Domain\Exceptions;


use DomainException;
use Throwable;

abstract class DomainError extends DomainException
{
    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract public function errorCode(): string;
    
    abstract protected function errorMessage(): string;

}
