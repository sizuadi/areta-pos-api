<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
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

            $this->users = $this->users->with($relations);
        }

        if ($request->has('search')) {
            $this->users = $this->users->where('name', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%');
        }

        $this->users = $this->users->paginate(
            $request->length ?? self::DEFAULT_PAGE_LENGTH
        )->appends(['search' => $request->search]);

        return response()->json([
            'success' => true,
            'data' => $this->users,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $formData = $request->validated();
        $formData['password'] = !$formData['password'] ? bcrypt('12345678') : bcrypt($formData['password']);

        try {
            $user = $this->users->create($formData);
            $user->assignRole($formData['role']);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'User created successfully.',
            'data' => $user,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        if ($request->has('relations')) {
            $relations = explode(',', $request->relations);

            $user = $user->load($relations);
        }

        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $formData = $request->validated();
        $formData['password'] = !$formData['password'] ? bcrypt('12345678') : bcrypt($formData['password']);

        try {
            $user->update($formData);
            $user->syncRoles($formData['role']);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'User updated successfully.',
            'data' => $user,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'User deleted successfully.',
            'status' => true,
        ], Response::HTTP_OK);
    }
}
