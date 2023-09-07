<?php

namespace App\Http\Controllers;

use App\Models\others;
use App\Http\Requests\StoreothersRequest;
use App\Http\Requests\UpdateothersRequest;

use Illuminate\Http\Request;

class OthersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $images = $request->file('image');
        $imageName = '';

        foreach ($images as $image) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images'), $new_name);
            $imageName = $imageName . $new_name . ",";
        }
        $imagedb = $imageName;
        return response()->json($imagedb);


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
    public function store(StoreothersRequest $request)
    {
        $images = $request->file('image');
        $imageName = '';

        foreach ($images as $image) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images'), $new_name);
            $imageName = $imageName . $new_name . ",";
        }
        $imagedb = $imageName;
        return response()->json($imagedb);
    }

    /**
     * Display the specified resource.
     */
    public function show(others $others)
    {
        //
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
    public function update(UpdateothersRequest $request, others $others)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(others $others)
    {
        //
    }
}
