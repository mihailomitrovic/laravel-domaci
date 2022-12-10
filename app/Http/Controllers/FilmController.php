<?php

namespace App\Http\Controllers;

use App\Http\Resources\FilmCollection;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return new FilmCollection($films);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:50',
            'slug' => 'required|string|max:50',
            'year' => 'required|string|max:4',
            'tagline' => 'required|string|max:50',
            'synopsis' => 'required|string|max:200',
            'genre' => 'required',
            'director' => 'required'
        ]);

        if($validator -> fails())
            return response()->json($validator->errors());
            
        $film = Film::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'year' => $request->year,
            'tagline' => $request->tagline,
            'synopsis' => $request->synopsis,
            'genre' => $request->genre,
            'director' => $request->director,
            'user' => Auth::user()->id
        ]);

        return response()->json(['The film has been added successfully.', new FilmResource($film)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:50',
            'slug' => 'required|string|max:50',
            'year' => 'required|string|max:4',
            'tagline' => 'required|string|max:50',
            'synopsis' => 'required|string|max:200',
            'genre' => 'required',
            'director' => 'required'
        ]);

        if($validator -> fails())
            return response()->json($validator->errors());
            
        $film = Film::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'year' => $request->year,
            'tagline' => $request->tagline,
            'synopsis' => $request->synopsis,
            'genre' => $request->genre,
            'director' => $request->director,
            'user' => Auth::user()->id
        ]);

        return response()->json(['The film has been added successfully.', new FilmResource($film)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return new FilmResource($film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:50',
            'slug' => 'required|string|max:50',
            'year' => 'required|string|max:4',
            'tagline' => 'required|string|max:50',
            'synopsis' => 'required|string|max:200',
            'genre' => 'required',
            'director' => 'required'
        ]);

        if($validator -> fails())
            return response()->json($validator->errors());
            
        $film->title = $request->title;
        $film->slug = $request->slug;
        $film->year = $request->year;
        $film->tagline = $request->tagline;
        $film->synopsis = $request->synopsis;
        $film->genre = $request->genre;
        $film->director = $request->director;

        $film->save();

        return response()->json(['The film has been updated successfully.', new FilmResource($film)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return response()->json(['The film has been deleted successfully.']);
    }
}
