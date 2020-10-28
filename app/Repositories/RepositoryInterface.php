<?php
namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function all();

    /**
     * Get all category
     * @return mixed
     */
    public function allCategory();

    /**
     * Get one
     * @param int $id
     * @return mixed
     */
    public function find($id);

    /**
     * Insert record
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update record
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function update(array $attributes, $id);
    
    /**
     * Delete record
     * @param int $id
     * @return mixed
     */
    public function delete($id);

}