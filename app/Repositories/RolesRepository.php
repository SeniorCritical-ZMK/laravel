<?php

namespace App\Repositories;

use App\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Base\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class RolesRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;
  
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, int $id) : bool
    {
        return $this->find($id)->update($attributes);
    }

    public function allPaginate($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc', int $perPage = 50)
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    public function pluck($key, $value)
    {
        return $this->model->pluck($value, $key);
    }

    public function findOneOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete(int $id) : bool
    {
        return $this->model->find($id)->delete();
    }
}