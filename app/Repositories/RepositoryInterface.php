<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all(array $properties);

    public function create(array $data);

    public function delete($id);

    public function get($id);

    public function modify(array $data, $id);
}