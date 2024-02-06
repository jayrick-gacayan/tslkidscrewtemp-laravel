<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admins = Admin::paginate();

        return [
            "data" => $admins,
            "message" => "Successfully fetched paginated admins",
            "success" => true,
        ];

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $super_admin = Auth::user();

        if (!$super_admin->is_super_admin) {
            return response()->json([
                'data' => null,
                'message' => 'Unauthorized',
                'success' => false,
            ], 403);
        }

        $validated = $request->validated();

        $admin = $super_admin->createdAdmins()->create($validated);

        return response()->json([
            'data' => $admin,
            'message' => 'Successfully created an admin user.',
            'success' => true
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        if (!$admin) {
            return response()->json(
                [
                    'data' => null,
                    'message' => 'Admin user not found.',
                    'success' => false,
                ]
                ,
                400
            );
        }

        return response()->json([
            'data' => $admin,
            'message' => 'Successfully retrieve data',
            'success' => true
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $tempAdmin = $admin;

        if (!$tempAdmin) {
            return response()->json([
                'data' => null,
                'message' => 'Admin user not found.',
                'success' => false,
            ], 404);
        }

        $validated = $request->validated();

        $admin->update($validated);

        return response()->json([
            'data' => $admin,
            'message' => 'Successfully updated an admin user.',
            'success' => true,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if (!Auth::user()->is_super_admin) {
            return response()->json([
                'data' => null,
                'message' => 'Unauthorized',
                'success' => false,
            ], 403);
        }

        $tempAdmin = $admin;

        if (!$tempAdmin) {
            return response()->json([
                'data' => null,
                'message' => 'Admin user not found.',
                'success' => false,
            ], 404);
        }

        $admin->delete();

        return response()->json([
            'data' => $tempAdmin,
            'message' => 'Successfully deleted an admin user.',
            'success' => true,
        ], 200);
    }
}