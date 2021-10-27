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

    /**
     * Retrieve paginated data of the Collection
     *
     * @param int $pageLimit
     * @param array $relations
     * @param string $searchQuery
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function paginate(int $pageLimit, ?array $relations = null, ?string $searchQuery = null)
    {
        if ($relations != null)
            $this->model = $this->model->with($relations);

        if ($searchQuery != null)
            $this->model = $this->model->where('name', 'LIKE', '%' . $searchQuery . '%');

        return $this->model->orderBy('created_at', 'desc')->paginate($pageLimit)->appends(['name' => $searchQuery]);
    }

}
