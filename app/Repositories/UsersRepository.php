<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Base\BaseRepository;

class UsersRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
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

    public function findOneOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }
}