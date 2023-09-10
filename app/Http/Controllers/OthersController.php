<?php

namespace App\Http\Controllers;

use App\Models\others;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return others::all();
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
        $insertother = others::create([
            'title' => $request->title,
            'delala_id' => $request->delala_id,
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