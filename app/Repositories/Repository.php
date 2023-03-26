<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

abstract class Repository
{
    protected $model;

    protected Builder $queryBase;

    public function __construct()
    {
        $this->setQuery();
    }

    private function setQuery(Builder $query = null)
    {
        $this->queryBase = is_null($query) ?
            $this->newQuery() : $query;
    }

    protected function getQuery()
    {
        return clone $this->queryBase;
    }

    protected function getInstance(): Model
    {
        return App::make($this->model);
    }

    protected function getKeyName(): string
    {
        return $this->model->getKeyName();
    }

    protected function newQuery()
    {
        return $this->getInstance()->newQuery();
    }

    public function create(array $attributes): Model
    {
        $entity = new $this->model($attributes);

        $entity->save();

        return $entity;
    }

    public function byKey($identifier)
    {
        return $this->getQuery()->where($this->getKeyName(), '=', $identifier);
    }

    public function find($identifier)
    {
        return $this->getQuery()->where($this->getKeyName(), '=', $identifier)->first();
    }

    protected function ilike(string $column, $value)
    {
        return $this->getQuery()->where($column, 'ilike', "%{$value}%");
    }

    public function get(array $columns = ['*'])
    {
        return $this->getQuery()->get($columns);
    }

    public function findUuid($uuid)
    {
        return $this->getQuery()->where('uuid', '=', $uuid)->first();
    }
}
