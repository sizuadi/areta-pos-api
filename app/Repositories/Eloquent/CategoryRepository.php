<?php

namespace App\Repositories\Eloquent;

use Akunbeben\Laravository\Repositories\Eloquent\BaseRepository;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $model;

    /**
    * Your model to use the Eloquent
    *
    * @param Category $model
    */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

}
