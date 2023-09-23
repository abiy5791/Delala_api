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
        $cars = car::where('approval', 1)->get();
        $houses = house::where('approval', 1)->get();
        $others = others::where('approval', 1)->get();
        $labours = labour::where('approval', 1)->get();
        $mergedData = collect();
        
        $cars = $cars->map(function ($car) {
            $car['model_type'] = 'car';
            return $car;
        });
        $houses = $houses->map(function ($house) {
            $house['model_type'] = 'house';
            return $house;
        });
        $labours = $labours->map(function ($labour) {
            $labour['model_type'] = 'labour';
            return $labour;
        });
        $others = $others->map(function ($other) {
            $other['model_type'] = 'other';
            return $other;
        });
       

        $mergedData = $mergedData->concat($labours);
        $mergedData = $mergedData->concat($cars);
        $mergedData = $mergedData->concat($houses);
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
