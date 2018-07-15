<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    /**
     * Model property on class instances
     */
    protected $model;

    /**
     * Constructor to bind model to repository
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function all(array $properties)
    {
        return $this->model->all($properties);
    }

    /**
     * Create a new record in the database
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Modify record in the database
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function modify(array $data, $id)
    {
        $record = $this->model->findOrFail($id);

        $record->update($data);

        return $record;
    }

    /**
     * Remove record from the database
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function delete($id)
    {
        $record = $this->model->findOrFail($id);

        $record->destroy($id);

        return $record;
    }

    /**
     * Show the record with the given id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get the associated model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the associated model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}