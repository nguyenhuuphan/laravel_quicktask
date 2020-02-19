<?php

namespace App\Repositories;

interface RepositoryInterface {
    public function all();

    public function find($id);

    public function delete($id);

    public function create(array $data);

    public function update(array $data);
}