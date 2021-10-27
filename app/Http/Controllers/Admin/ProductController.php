<?php

namespace App\Http\Controllers\Admin;

use App\Common\GenericMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productsRepository;
    private $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productsRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->productsRepository = $productsRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productsRepository->paginate(10);

        return view('administrator.product.index', compact(
            'products',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();

        return view('administrator.product.create', compact(
            'categories',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            $product = $this->productsRepository->create($request->validated());
        } catch (\Throwable $th) {
            toastr()->error(GenericMessage::ERROR_MESSAGE);
            return redirect()->route('admin.products.create')->withInput();
        }

        toastr()->success('Produk berhasil ditambahkan, Silahkan upload gambar produk.', 'Produk Ditambah');
        return redirect()->route('admin.products.image', ['product' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('administrator.product.show', compact(
            'product',
        ));
    }

    /**
     * Display the specified resource image.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function image(Product $product)
    {
        return view('administrator.product.image', compact(
            'product',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->getAll();

        return view('administrator.product.edit', compact(
            'product',
            'categories',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $this->productsRepository->update($product->id, $request->validated());
        } catch (\Throwable $th) {
            toastr()->error(GenericMessage::ERROR_MESSAGE);
            return redirect()->route('admin.products.edit', ['product' => $product])->withInput();
        }

        toastr()->success('Produk berhasil diubah.');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $this->productsRepository->delete($product->id);
        } catch (\Throwable $th) {
            toastr()->error(GenericMessage::ERROR_MESSAGE);
            return redirect()->route('admin.products.index');
        }

        toastr()->success('Produk berhasil diubah.');
        return redirect()->route('admin.products.index');
    }
}
