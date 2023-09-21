<?php

namespace App\Http\Controllers;
use App\Models\car;
use App\Models\house;
use App\Models\labour;
use App\Models\others;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $labour = labour::all();
        $car = car::all();
        $house = house::all();
        $others = others::all();
        $mergedData = collect();

        $mergedData = $mergedData->concat($labour);
        $mergedData = $mergedData->concat($car);
        $mergedData = $mergedData->concat($house);
        $mergedData = $mergedData->concat($others);
        return $mergedData;
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
