<?php

namespace App\Http\Controllers;

use App\Models\house;
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

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'type' => $request->type,
            'parking' => $request->parking,
            'bathrooms' => $request->bathrooms,
            'bedrooms' => $request->bedrooms,
            'location' => $request->location,
            'details' => $request->details,
            'image' => implode('|', $image)
        ]);
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return house::find($id);
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
    public function update(Request $request, string $id)
    {
        if ($request->has('approval')) {
            $house = house::find($id);
            $house->update($request->all());
            return response()->json($request);
        } else {
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

            // Find the car object to update
            $house = house::find($id); // Replace $id with the ID of the car to update
            $house->title = $request->title;
            $house->price = $request->price;
            $house->area = $request->area;
            $house->type = $request->type;
            $house->parking = $request->parking;
            $house->bathrooms = $request->bathrooms;
            $house->bedrooms = $request->bedrooms;
            $house->location = $request->location;
            $house->details = $request->details;
            if (!empty($image)) {
                $house->image = implode('|', $image);
            }


            // Save the updated car object
            $house->save();

            return response()->json($request);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return house::destroy($id);
    }
}