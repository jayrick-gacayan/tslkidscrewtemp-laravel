<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $locations = Location::with('admin_director')
            ->paginate($request->get('per_page') ?: 10);

        return response()->json([
            'data' => $locations,
            'message' => 'Successfully fetched locations.',
            'success' => true
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validated();

        $location = Location::create($validated);

        return response()->json([
            'data' => $location,
            'message' => 'Successfull created a location.',
            'success' => true
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        if (!$location) {
            return response()->json([
                'data' => null,
                'message' => 'Location not found.',
                'success' => false,
            ], 404);
        }

        $location['admin_director'] = $location->admin_director;

        return response()->json([
            'data' => $location,
            'message' => 'Successfully retrieve location.',
            'success' => true
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        if (!$location) {
            return response()->json([
                'data' => null,
                'message' => 'Location not found.',
                'success' => false,
            ], 404);
        }

        $validated = $request->validated();

        $location->update($validated);

        return response()->json([
            'data' => $location,
            'message' => 'Successfully updated a location.',
            'success' => true,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $tempLocation = $location;

        if (!$tempLocation) {
            return response()->json([
                'data' => null,
                'message' => 'Location not found.',
                'success' => false
            ], 404);
        }

        $location->delete();

        return response()->json([
            'data' => $tempLocation,
            'message' => 'Successfully deleted a location.',
            'success' => true
        ], 200);
    }
}
