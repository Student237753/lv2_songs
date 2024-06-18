<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band; // Add this line to import the Band model
use Illuminate\Http\Request;
use App\Models\Song;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }
    public function show($id)
    {
        $album = Album::with('band', 'songs')->findOrFail($id);
        return view('albums.show', compact('album'));
    }

    public function create()
    {
        $bands = Band::all(); // Fetch all bands to populate the dropdown
        return view('albums.create', compact('bands'));
    }
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $bands = Band::all();
        $songs = Song::whereNotIn('id', $album->songs->pluck('id'))->get(); // Get only songs not in the album

        return view('albums.edit', compact('album', 'bands', 'songs'));
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'band' => 'required|exists:bands,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'songs' => 'array|exists:songs,id', // Validate that songs are an array of existing song IDs
        ]);

        // Update album details
        $album->name = $validatedData['name'];
        $album->band_id = $validatedData['band'];
        $album->year = $validatedData['year'];
        $album->update();

        // Sync songs with the album
        if (isset($validatedData['songs'])) {
            $album->songs()->sync($validatedData['songs']);
        } else {
            $album->songs()->sync([]); // If no songs are selected, detach all songs
        }

        return redirect()->route('albums.index')->with('success', 'Album [' . $album->name . '] successfully updated.');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'band_id' => 'required|exists:bands,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Create a new album instance
        $album = new Album();
        $album->name = $request->name;
        $album->band_id = $request->band_id;
        $album->year = $request->year;

        // Generate a random number for times_sold in the millions
        $album->times_sold = rand(1000000, 9999999);

        $album->save();

        // Redirect back to the albums index page with a success message
        return redirect()->route('albums.index')->with('success', 'Album [' . $album->name . '] successfully created.');
    }
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album [' . $album->name . '] successfully deleted.');
    }
}
