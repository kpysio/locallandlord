<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:landlord']);
    }

    public function index()
    {
        $landlord = auth()->user()->landlord;
        $properties = $landlord->properties()->paginate(10);
        return view('landlord.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('landlord.properties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|string',
            'rent_amount' => 'nullable|numeric|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:available,rented,maintenance',
        ]);

        auth()->user()->landlord->properties()->create($validated);

        return redirect()->route('landlord.properties.index')->with('status', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        $this->authorize('update', $property);
        return view('landlord.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $this->authorize('update', $property);
        return view('landlord.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $this->authorize('update', $property);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|string',
            'rent_amount' => 'nullable|numeric|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:available,rented,maintenance',
        ]);

        $property->update($validated);

        return redirect()->route('landlord.properties.index')->with('status', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $this->authorize('update', $property);
        $property->delete();
        return redirect()->route('landlord.properties.index')->with('status', 'Property deleted successfully.');
    }
}
