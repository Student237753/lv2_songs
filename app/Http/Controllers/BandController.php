<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function show($id)
    {
        $band = Band::with('albums')->findOrFail($id);
        return view('bands.show', compact('band'));
    }
}