<?php

namespace App\Repositories\Eloquent;

use Akunbeben\Laravository\Repositories\Eloquent\BaseRepository;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Services\ImageUploadService;

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

        return $this->model->orderBy('created_at', 'desc')->paginate($pageLimit)->appends(['name' => $searchQuery]);
    }

    public function upload(Product $product, $imageFile)
    {
        $uploadedFile = (new ImageUploadService($imageFile, "products/$product->id/"))
            ->upload()
            ->resize(300, 180)
            ->getFileName();

        if ($product->image) {
            $product->image()->update([
                'path' => public_path("storage/products/$product->id"),
                'file_name' => $uploadedFile,
                'source' => asset("storage/products/$product->id/$uploadedFile"),
            ]);

            return $product;
        }

        $product->image()->create([
            'path' => public_path("storage/products/$product->id"),
            'file_name' => $uploadedFile,
            'source' => asset("storage/products/$product->id/$uploadedFile"),
        ]);

        return $product;
    }
}
