<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Admin::class, 'admins.admin-users');
    }

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
        $validated = $request->validated();

        // $admin = Auth::user()->createdAdminsBy()->create(
        //     [
        //         "name" =>
        //     ]
        // )
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
        return response()->json([
            'data' => $admin,
            'message' => 'Successfully retrieve data',
            'success' => true
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
