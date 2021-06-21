<?php


namespace Src\School;


interface SchoolRepository
{
    static public function insert(array $values): bool;

    static public function getByName(string $name): array;

    static public function remove(int $id): bool;

    static public function getAll(): array;
}
