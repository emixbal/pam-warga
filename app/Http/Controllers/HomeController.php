<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $parent_title = "Dashboard";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Home",
            ],
            "data" => $data,
            "role" => Auth::user()->role->name,
        ];

        return view("home", $pass);
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
    public function show(Partai $partai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partai $partai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partai $partai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partai $partai)
    {
        //
    }
}
