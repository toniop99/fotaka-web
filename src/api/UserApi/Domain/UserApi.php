<?php

namespace Src\api\UserApi\Domain;

use Src\shared\Domain\Model;
use Src\shared\Domain\ValueObject\Uuid;

final class UserApi extends Model
{
    public function __construct(
        private UserApiId $id,
        private Active    $active,
        private Write     $write,
        private Read      $read,
        private Token     $token,
    )
    {
    }

    public static function fromPrimitives(array $primitives): UserApi
    {
        return new self(
            new UserApiId($primitives['id']),
            new Active($primitives['active']),
            new Write($primitives['write']),
            new Read($primitives['read']),
            new Token($primitives['token'])
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->value(),
            'active' => $this->active->value(),
            'write' => $this->write->value(),
            'read' => $this->read->value(),
            'token' => $this->token->value(),
        ];
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function active(): Active
    {
        return $this->active;
    }

    public function write(): Write
    {
        return $this->write;
    }

    public function read(): Read
    {
        return $this->read;
    }

    public function token(): Token
    {
        return $this->token;
    }
}
