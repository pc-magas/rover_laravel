<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositortInterface
{
    /**
     * Fetch all items
     * @param int $page The page used in pagination
     * @param int $limit The number of items/page
     * @return mixed[]
     */
    public function all(int $page, int $limit);

    /**
     * Update a single value.
     *
     * @param string $key The key of the item
     * @param mixed $value The value
     * @return DatabaseRepositortInterface
     */
    public function updateItem(string $key, $value);

    /**
     * Check if an item exists.
     *
     * @param [type] $item
     * @return boolean
     */
    public function has($item);

    /**
     * Count how many items exists with the provided params
     *
     * @param array $params The params to specify how it will be counted
     * @return int
     */
    public function count(array $params);


    /**
     * Creates a new model
     *
     * @param array $data The required parameter that the new model will have
     * @return Model
     */
    public function create(array $data);

    /**
     * Update item with given id
     *
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function update(array $data, int $id);

    /**
     * Deletes the model
     * @param Model $model
     * @return boolean
     */
    public function delete(Model $model);

    /**
     * Search for a specific model
     *
     * @param int $id The id to search for
     * @return void
     */
    public function searchById(int $id);

    /**
     * Search item with parameters.
     *
     * @param array $params The parameters to search with
     * @return Model[]
     */
    public function search(array $params);
}
