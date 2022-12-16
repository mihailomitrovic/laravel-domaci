<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmCollection;
use App\Models\Film;
use Illuminate\Http\Request;

class GenreFilmController extends Controller
{
    public function index($genre)
    {
        $films = Film::get()->where('genre', $genre);

        if(is_null($films))
            return response()->json('Data not found', 404);

        return new FilmCollection($films);
    }
}
