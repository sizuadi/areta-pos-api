<?php

namespace App\Http\Controllers\Api\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $suppliers;

    public function __construct(Supplier $suppliers)
    {
        $this->suppliers = $suppliers;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $this->suppliers = $this->suppliers->where('name', 'LIKE', '%' . $request->search . '%');
        }

        return response()->json([
            'success' => true,
            'message' => 'supplier list',
            'data' => $this->suppliers->paginate($request->length ?? 5)->appends(['search' => $request->search])
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $supplier = Supplier::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'supplier created',
            'data' => $supplier
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return response()->json([
            'success' => true,
            'message' => 'supplier show',
            'data' => $supplier
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'supplier updated',
            'data' => $supplier
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json([
            'success' => true,
            'message' => 'supplier deleted'
        ], 200);
    }
}
