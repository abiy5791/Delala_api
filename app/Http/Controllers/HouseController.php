<?php

namespace App\Http\Controllers;

use App\Models\house;
use App\Http\Requests\StorehouseRequest;
use App\Http\Requests\UpdatehouseRequest;
use Illuminate\Http\Request;
use App\Models\media;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $images = $request->file('image');
        $imagePaths = [];

        foreach ($images as $image) {
            $newName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images'), $newName);

            // Store the full path in the array
            $imagePaths[] = public_path('/uploads/images') . '/' . $newName;

        }
        foreach ($imagePaths as $imagepath) {
            $UploadImage = media::create(['path' => $imagepath]);
        }
        // $imagePaths now contains the full paths of the uploaded images
        $uploadHouse = house::create($request->except("image"));
        return response()->json($uploadHouse);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorehouseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(house $house)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(house $house)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatehouseRequest $request, house $house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(house $house)
    {
        //
    }
}