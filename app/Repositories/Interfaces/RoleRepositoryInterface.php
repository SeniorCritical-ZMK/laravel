<?php

namespace App\Repositories\Interfaces;

use App\Base\Interfaces\BaseRepositoryInterface;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
   public function getModel();

   public function create(array $attributes);

   public function update(array $attributes, int $id);

   public function allPaginate($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc', int $perPage = 50);

   public function pluck($key, $value);

   public function findOneOrFail(int $id);

   public function delete(int $id);
}