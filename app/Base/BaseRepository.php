<?php

namespace App\Base;

use App\Base\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @codeCoverageIgnore
 */
abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
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

    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    public function paginateAll($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc', int $perPage = 50)
    {
        return $this->model->select($columns)->orderBy($orderBy, $sortBy)->paginate($perPage);
    }

    public function pluck($key, $value)
    {
        return $this->model->pluck($value, $key);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function findOneOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function findBy(array $data)
    {
        return $this->model->where($data)->all();
    }

    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    public function paginateArrayResults(array $data, int $perPage = 50)
    {
        $page = request()->get('page', 1);
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($data, $offset, $perPage, false),
            count($data),
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'query' => request()->query()
            ]
        );
    }

    public function delete(int $id) : bool
    {
        return $this->model->find($id)->delete();
    }
}