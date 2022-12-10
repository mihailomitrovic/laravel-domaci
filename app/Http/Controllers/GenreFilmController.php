<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class GenreFilmController extends Controller
{
    public function index($genre)
    {
        $genres = Film::get()->where('genre', $genre);

        if(is_null($genres))
            return response()->json('Data not found', 404);

        return response()->json($genres);
    }
}
