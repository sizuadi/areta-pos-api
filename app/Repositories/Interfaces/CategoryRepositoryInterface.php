<?php

namespace App\Repositories\Interfaces;

use Akunbeben\Laravository\Repositories\Interfaces\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
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
}
