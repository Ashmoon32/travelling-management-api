<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;


class DestinationController extends Controller
{
    public function index()
    {
        $places = \App\Models\Destination::all();

        return response()->json($places);
    }

    public function store(Request $request)
    {
        // Rules for validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|min:10',
        ]);

        // Action
        $destination = Destination::create($validatedData);

        // Response
        return response()->json([
            'message' => 'Destination added to your bucket list!',
            'data' => $destination
        ], 201); // successful created
    }
}
