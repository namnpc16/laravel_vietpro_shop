<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor
     */
    public function __construct()
    {
       $this->setModel(); 
    }

    /**
     * Get model 
     * 
     * @return string
     */
    abstract protected function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all
     * 
     * @return Collection
     */
    public function all()
    {
        return $this->_model->latest()->paginate(5);
    }

    /**
     * Get all category
     * 
     * @return Collection
     */
    public function allCategory()
    {
        return $this->_model->all();
    }

    /**
     * Get one 
     * 
     * @param int $id
     * @return Collection
     */
    public function find($id)
    {
        return $this->_model->find($id);
    }

    /**
     * Create one
     * 
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    /**
     * Update one
     * 
     * @param int $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update(array $attributes, $id)
    {
        $result = $this->_model->find($id);

        if ($result) {
            return $result->update($attributes);
        }

        return false;
    }

    /**
     * Delete one
     * 
     * @param int $id
     * @return bool|mixed
     */
    public function delete($id)
    {
        $result = $this->_model->find($id);

        if ($result) {
            return $result->delete();
        }

        return false;
    }
    
}