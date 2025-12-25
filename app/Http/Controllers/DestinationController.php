<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DestinationController extends Controller
{
    public function index()
    {
        $places = \App\Models\Destination::all();

        return response()->json($places);
    }
}
