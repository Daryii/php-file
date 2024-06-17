<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function genre() {
        // get all genres with Genre model -> arrary with genres

        return view("Genre.genre"); // put array here
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Genre.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Genre::create([
            "name" => $request->get("genreName"),
        ]);

        dd("AAGEKOMEN!");

    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        // fetch all the songs with the Songs model.

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
