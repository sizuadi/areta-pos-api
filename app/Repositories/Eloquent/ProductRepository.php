<?php

namespace App\Repositories\Eloquent;

use Akunbeben\Laravository\Repositories\Eloquent\BaseRepository;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $model;

    /**
    * Your model to use the Eloquent
    *
    * @param Product $model
    */
    public function __construct(Product $model)
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
            $this->model = $this->model->where('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhereRelation('category', 'name', 'LIKE', '%' . $searchQuery . '%');

        return $this->model->orderBy('created_at', 'desc')->paginate($pageLimit)->appends(['search' => $searchQuery]);
    }
}
