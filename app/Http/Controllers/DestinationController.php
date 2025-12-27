<?php

namespace App\Http\Controllers;

use App\Http\Resources\DestinationResource;
use Illuminate\Http\Request;



class DestinationController extends Controller
{
    public function index()
    {
        $destinations = \App\Models\Destination::all();

        return DestinationResource::collection($destinations);
    }

    public function store(Request $request)
    {
        // Rules for validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|min:10',
        ]);

        // Action
        $destination = \App\Models\Destination::create($validatedData);

        // Response
        return response()->json([
            'message' => 'Destination added to your bucket list!',
            'data' => $destination
        ], 201); // successful created
    }

    public function show($id)
    {
        $destination = \App\Models\Destination::findOrFail($id);
        return new DestinationResource($destination);
    }

    public function destroy($id)
    {
        $destination = \App\Models\Destination::findOrFail($id);
        $destination->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ], 200);
    }
}
