<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $roles;
    protected $permissions;

    public function __construct(
        Role $roles,
        Permission $permissions
    ) {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('relations')) {
            $relations = explode(',', $request->relations);

            $this->roles = $this->roles->with($relations);
        }

        if ($request->has('search')) {
            $this->roles = $this->roles->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $this->roles = !$request->has('no_paginate')
            ? $this->roles->paginate($request->length ?? self::DEFAULT_PAGE_LENGTH)->appends(['search' => $request->search])
            : $this->roles->get();

        return response()->json([
            'success' => true,
            'data' => $this->roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        try {
            $role = $this->roles->create($request->validated() + ['guard_name' => 'web']);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Role created successfully.',
            'data' => $role,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Role $role)
    {
        if ($request->has('relations')) {
            $relations = explode(',', $request->relations);

            $role = $role->load($relations);
        }

        return response()->json($role, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        try {
            $role->update($request->validated());
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Role updated successfully.',
            'data' => $role,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Role deleted successfully.',
            'status' => true,
        ], Response::HTTP_OK);
    }
}
