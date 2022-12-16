<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmCollection;
use App\Models\Film;
use Illuminate\Http\Request;

class DirectorFilmController extends Controller
{
    public function index($director)
    {
        $films = Film::get()->where('director', $director);

        if(is_null($films))
            return response()->json('Data not found', 404);

        return new FilmCollection($films);//response()->json($films);
    }
}
