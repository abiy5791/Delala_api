<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\media;

class UploadController extends Controller
{
    // public function upload(Request $request)
    // {
    //     $images = $request->file('image');
    //     $imageName = '';


    //     foreach ($images as $image) {
    //         $new_name = rand() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('/uploads/images'), $new_name);
    //         $imageName = $imageName . $new_name . ",";


    //         $ImagePath = public_path('/uploads/images') . '/' . $new_name;
    //         $UploadImage = media::create(['path'->$ImagePath]);
    //     }
    //     $imagedb = $imageName;
    //     return response()->json($imagedb);

    // }
    public function upload(Request $request)
    {
        // $images = $request->file('image');
        // $imagePaths = [];

        // foreach ($images as $image) {
        //     $newName = rand() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('/uploads/images'), $newName);

        //     // Store the full path in the array
        //     $imagePaths[] = public_path('/uploads/images') . '/' . $newName;

        // }
        // foreach ($imagePaths as $imagepath) {
        //     $UploadImage = media::create(['path' => $imagepath]);
        // }
        // // $imagePaths now contains the full paths of the uploaded images
        // return response()->json(['image_paths' => $imagePaths]);

        $image = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = public_path('/uploads/images/');
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        media::create([
            'path' => implode('|', $image)
        ]);
        return $image;
    }

}