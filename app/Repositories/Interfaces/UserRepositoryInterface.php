<?php

namespace App\Repositories\Interfaces;

use App\Base\Interfaces\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getModel();

    public function create(array $attributes);

    public function update(array $attributes, int $id);

    public function findOneOrFail(int $id);
}