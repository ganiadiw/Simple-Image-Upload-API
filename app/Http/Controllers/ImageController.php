<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    { 
        return ImageResource::collection(Image::paginate(10))
                ->additional(['message' => 'images data sucessfully loaded']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg']
        ]);

        $image = $request->file('image');
        $imagePath = $image->store('/images');
        $imageName = $image->getClientOriginalName();

        $image = Image::create([
            'image_name' => $imageName,
            'image_path' => $imagePath,
        ]);

        return response()->json([
            'message' => 'Upload image successful',
            'data' => [
                'image_name' => $imageName,
                'image_path' => Storage::url($imagePath)
            ]
        ]);
    }

    public function show(Image $image)
    {
        return response()->json([
            'message' => 'Image data successfully loaded',
            'data' => new ImageResource($image),
        ]);        
    }


    public function update(Request $request, Image $image)
    {
        $this->validate($request, [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            '_method' => ['required']
        ]);

        $newImage = $request->file('image');
        $imagePath = $newImage->store('/images');
        $imageName = $newImage->getClientOriginalName();

        Storage::delete($image->image_path);

        $image->update([
            'image_name' => $imageName,
            'image_path' => $imagePath,
        ]);    

        return response()->json([
            'message' => 'Image data successfully updated',
            'data' => new ImageResource($image),
        ]); 
    }

    public function destroy(Image $image)
    {
        Storage::delete($image->image_path);
        $image->delete();
        
        return response()->json([
            'data' => 'Succesfully delete image'
        ]);
    }
}
