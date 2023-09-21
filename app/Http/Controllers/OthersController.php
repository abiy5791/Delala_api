<?php

namespace App\Http\Controllers;

use App\Models\others;
use App\Http\Requests\StoreothersRequest;
use App\Http\Requests\UpdateothersRequest;

class OthersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreothersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return others::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(others $others)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $others = others::find($id);
        $others->update($request->all());
        return $others;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return others::destroy($id);
    }
}