<?php

namespace App\Http\Controllers\API;

use App\Common\GenericMessage;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productsRepository;

    public function __construct(
        ProductRepositoryInterface $productsRepository,
    ) {
        $this->productsRepository = $productsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->productsRepository->paginate($request->length, ['category', 'image'], $request->search);

        return response()->json($products, 200);
    }

    /**
     * Upload product image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $fileRequest = $request->file('image');

        try {
            $this->productsRepository->upload($product, $fileRequest);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => GenericMessage::ERROR_MESSAGE,
                'error' => $th->getMessage(),
            ], 500);
        }

        return response()->json(['message' => 'Upload gambar produk berhasil.'], 200);
    }
}
