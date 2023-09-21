<?php

namespace App\Http\Controllers;

use App\Models\labour;

use Illuminate\Http\Request;

class LabourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return labour::all();
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
        $insertlabour = labour::create([
            'title' => $request->title,
            'delala_id' => $request->delala_id,
            'name' => $request->name,
            'skills' => $request->skills,
            'type' => $request->type,
            'salary' => $request->salary,
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
        return labour::find($id);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(labour $labour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $labour = labour::find($id);
        $labour->update($request->all());
        return $labour;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return labour::destroy($id);
    }
}