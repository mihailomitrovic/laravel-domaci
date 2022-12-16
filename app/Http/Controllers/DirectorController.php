<?php

namespace App\Http\Controllers;

use App\Http\Resources\DirectorCollection;
use App\Http\Resources\DirectorResource;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::all();
        return new DirectorCollection($directors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'slug' => 'required|string|max:50'
        ]);

        if($validator -> fails())
            return response()->json($validator->errors());
            
        $director = Director::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'slug' => $request->slug,
            'user' => Auth::user()->id
        ]);

        return response()->json(['The director has been added successfully.', new DirectorResource($director)]);
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'slug' => 'required|string|max:50'
        ]);

        if($validator -> fails())
            return response()->json($validator->errors());
            
        $director = Director::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'slug' => $request->slug,
            'user' => Auth::user()->id
        ]);

        return response()->json(['The director has been added successfully.', new DirectorResource($director)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        return new DirectorResource($director);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Director $director)
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
    public function update(Request $request, Director $director)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'slug' => 'required|string|max:50'
        ]);

        if($validator -> fails())
            return response()->json($validator->errors());
            
        $director->first_name = $request->first_name;
        $director->last_name = $request->last_name;
        $director->slug = $request->slug;

        $director->save();

        return response()->json(['The director has been updated successfully.', new DirectorResource($director)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        $director->delete();

        return response()->json(['The director has been deleted successfully.']);
    }
}
