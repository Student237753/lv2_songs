<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $album = Album::all();
        return view('songs.create', ['albums'=>$album]);
    }

    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'singer' => 'required|string|max:255',
        'release_date' => 'required|integer|min:1900|max:' . date('Y'),
    ]);

    // Create a new song instance and set its attributes
    $song = new Song();
    $song->title = $validatedData['title'];
    $song->singer = $validatedData['singer'];
    $song->release_date = $validatedData['release_date'];

    // Save the song to the database
    $song->save();

    // Attach the selected albums to the song
    if ($request->has('album')) {
        $song->albums()->sync($request->input('album'));
    }

    // Prepare success message
    $successMessage = "Song: \"{$song->title}\" by \"{$song->singer}\" created successfully.";

    // Redirect back to the index page with the success message
    return redirect()->route('songs.index')->with('success', $successMessage);
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);
        $album = $song->albums->first();
        return view('songs.show', compact('song', 'album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $albums = Album::all(); // Fetch all albums
        return view('songs.edit', ['song' => $song, 'albums' => $albums]);
        
    }

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{
    $song = Song::findOrFail($id);

    // Store previous song details
    $previousTitle = $song->title;
    $previousSinger = $song->singer;
    $previousReleaseDate = $song->release_date;

    // Validate the updated data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'singer' => 'required|string|max:255',
        'release_date' => 'required|integer|min:1900|max:' . date('Y'),
    ]);

    // Update the song with the new data
    $song->title = $validatedData['title'];
    $song->singer = $validatedData['singer'];
    $song->release_date = $validatedData['release_date'];
    $song->save();

    // Update the albums associated with the song
    if ($request->has('album')) {
        // Sync the selected albums with the song
        $song->albums()->sync($request->input('album'));
    } else {
        // If no albums are selected, detach all albums from the song
        $song->albums()->detach();
    }

    // Prepare the message
    $message = "Song updated successfully from \"$previousTitle\" by \"$previousSinger\" (Released: \"$previousReleaseDate\") to \"$song->title\" by \"$song->singer\" (Released: \"$song->release_date\")";

    // Redirect back to the songs index with the message
    return redirect()->route('songs.index')->with('success', $message);
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the song by ID
        $song = Song::findOrFail($id);

        // Get the title and singer of the song
        $title = $song->title;
        $singer = $song->singer;

        // Delete the song
        Song::destroy($id);

        // Redirect back to the songs index with a success message including the song name and singer
        return redirect()->route('songs.index')->with('success', "Song '{$title}' by '{$singer}' successfully deleted.");
    }
}
