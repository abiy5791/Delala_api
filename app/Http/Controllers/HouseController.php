<?php

namespace App\Http\Controllers;

use App\Models\house;
use App\Http\Requests\StorehouseRequest;
use App\Http\Requests\UpdatehouseRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return house::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $image = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'uploads/images/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        $insertcar = house::create([
            'title' => $request->title,
            'delala_id' => $request->delala_id,
            'status' => $request->status,
            'price' => $request->price,
            'area' => $request->area,
            'location' => $request->location,
            'details' => $request->details,
            'image' => implode('|', $image)
        ]);
        return response()->json($request);

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