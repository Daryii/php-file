<?php

namespace App\Http\Controllers;

use App\Models\PlayList;
use Illuminate\Http\Request;

class PlayListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("PlayList.playList");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlayList $playList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlayList $playList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlayList $playList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlayList $playList)
    {
        //
    }
}
