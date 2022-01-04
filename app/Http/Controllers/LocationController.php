<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    public function index()
    {
        $provider = auth()->user();
        return view('locations.index', compact( 'provider'));
    }

    public function create()
    {
        $locations_count = auth()->user()->locations()->count();
        if ($locations_count >= 5) {
            return redirect()->back()->with('error', "You have 5 locations , you can't add more");
        }
        return view('locations.create');
    }

    public function store(LocationRequest $request)
    {
        auth()->user()->locations()->create($request->validated());
        return redirect()->route('locations.index')->with('success', 'Location added successfully');
    }
}
