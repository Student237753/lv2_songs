<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', compact('bands'));
    }

    public function create()
    {
        return view('bands.create');
    }

    public function store(Request $request)
    {
        // Validate the request and store the new band
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'founded' => 'required|integer|min:1900|max:' . date('Y'),
            'active_till' => 'nullable|integer|min:1900|max:' . date('Y')
        ]);

        $band = new Band();
        $band->name = $request->name;
        $band->genre = $request->genre;
        $band->founded = $request->founded;
        $band->active_till = $request->active_till ?: 'Still active'; // Default to 'Still active' if field is empty
        $band->save();

        // Customize success message with band name
        $message = 'Band [' . $band->name . '] created successfully!';

        return redirect()->route('bands.index')->with('success', $message);
    }


    public function show($id)
    {
        // Eager load albums and their songs
        $band = Band::with('albums.songs')->findOrFail($id);
        return view('bands.show', compact('band'));
    }

    public function edit($id)
    {
        $band = Band::findOrFail($id);
        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, $id)
    {
        $band = Band::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'founded' => 'required|integer|min:1900|max:' . date('Y'),
            'active_till' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);

        // Check if active_till is empty, then set it to "Still active"
        if (empty($validatedData['active_till'])) {
            $validatedData['active_till'] = 'Still active';
        }

        // Update the band with the validated data
        $band->update($validatedData);

        // Customize success message with band name
        $message = 'Band [' . $band->name . '] successfully updated.';

        return redirect()->route('bands.index')->with('success', $message);
    }

    public function destroy($id)
    {
        $band = Band::findOrFail($id);
        $bandName = $band->name; // Store the name of the band before deleting
        $band->delete();

        // Customize success message with band name
        $message = 'Band [' . $bandName . '] deleted successfully!';

        return redirect()->route('bands.index')->with('success', $message);
    }
}