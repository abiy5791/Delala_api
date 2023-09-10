<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return car::all();
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
        $insertcar = car::create([
            'title' => $request->title,
            'make' => $request->make,
            'delala_id' => $request->delala_id,
            'model' => $request->model,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'fueltype' => $request->fueltype,
            'color' => $request->color,
            'price' => $request->price,
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
        return car::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = car::find($id);
        $car->update($request->all());
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return car::destroy($id);
    }
}