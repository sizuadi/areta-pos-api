<?php

namespace App\Repositories\Interfaces;

use Akunbeben\Laravository\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Product;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Retrieve paginated data of the Collection
     *
     * @param int $pageLimit
     * @param array $relations
     * @param string $searchQuery
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function paginate(int $pageLimit, ?array $relations = null, ?string $searchQuery = null);

    public function upload(Product $product, $imageFile);
}
