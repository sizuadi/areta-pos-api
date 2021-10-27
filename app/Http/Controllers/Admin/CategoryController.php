<?php

namespace App\Http\Controllers\Admin;

use App\Common\GenericMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->paginate(10);

        return view('administrator.category.index', compact(
            'categories',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            $this->categoryRepository->create($request->validated());
        } catch (\Throwable $th) {
            toastr()->error(GenericMessage::ERROR_MESSAGE);
            return redirect()->route('admin.categories.create')->withInput();
        }

        toastr()->success('Kategori berhasil ditambahkan.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('administrator.category.edit', compact(
            'category',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $this->categoryRepository->update($category->id, $request->validated());
        } catch (\Throwable $th) {
            toastr()->error(GenericMessage::ERROR_MESSAGE);
            return redirect()->route('admin.categories.create')->withInput();
        }

        toastr()->success('Kategori berhasil diubah.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $this->categoryRepository->delete($category->id);
        } catch (\Throwable $th) {
            toastr()->error(GenericMessage::ERROR_MESSAGE);
            return redirect()->route('admin.categories.create')->withInput();
        }

        toastr()->success('Kategori berhasil dihapus.');
        return redirect()->route('admin.categories.index');
    }
}
