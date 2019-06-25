<?php
namespace App\Repositories;

use NilPortugues\Foundation\Infrastructure\Model\Repository\Eloquent\EloquentRepository;
use App\Model\Rover;

class RoverRepository extends EloquentRepository
{
    protected $userAdapter;

    /**
     * @param $userAdapter
     */
    public function __construct($userAdapter)
    {
        $this->userAdapter = $userAdapter;
    }

    /**
     * {@inheritdoc}
     */
    protected function modelClassName()
    {
        return Rover::class;
    }

    /**
     * {@inheritdoc}
     */
    public function find(Identity $id, Fields $fields = null)
    {
        $eloquentModel = parent::find($id, $fields);

        return $this->userAdapter->fromEloquent($eloquentModel);
    }

    /**
     * {@inheritdoc}
     */
    public function findBy(Filter $filter = null, Sort $sort = null, Fields $fields = null)
    {
        $eloquentModelArray = parent::findBy($filter, $sort, $fields);

        return $this->fromEloquentArray($eloquentModelArray);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(Pageable $pageable = null)
    {
        $page = parent::findAll($pageable);

        return new Page(
            $this->fromEloquentArray($page->content()),
            $page->totalElements(),
            $page->pageNumber(),
            $page->totalPages(),
            $page->sortings(),
            $page->filters(),
            $page->fields()
        );
    }

    /**
    * @param array $eloquentModelArray
    * @return array
    */
   protected function fromEloquentArray(array $eloquentModelArray) :array
   {
        $results = [];
        foreach ($eloquentModelArray as $eloquentModel) {
            //This is required to handle findAll returning array, not objects.
            $eloquentModel = (object) $eloquentModel;

            $results[] = $this->userAdapter->fromEloquent($eloquentModel);
        }

        return $results;
   }
}
