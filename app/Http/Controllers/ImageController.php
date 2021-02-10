<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        try {
            $images = Image::all();
            
            foreach ($images as $image) {
                $imageUrl = $image->image_path ? Storage::url($image->image_path) : null;
                $response[] = [
                    'id' => $image->id,
                    'image_name' => $image->image_name,
                    'image_url' => $imageUrl
                ];
            }

            return response()->json($response);
        } catch (Exception $e) {
            return response()->json($e);
        }
        
    }

    public function show($id)
    {
        try {
            $image = Image::find($id);

            $imageUrl = $image->image_path ? Storage::url($image->image_path) : null;

            $response = [
                'id' => $image['id'],
                'image_name' => $image['image_name'],
                'image_url' => $imageUrl
            ];

            return response()->json($response);
        } catch (Exception $e) {
            return response()->json($e);
        }
        
    }

    public function create(Request $request)
    {
        try {
            $this->validate($request, [
                'image' => 'image|mimes:png,jpg,jpeg'
            ]);

            if ($request->file('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('/images');
                $imageName = $image->getClientOriginalName();
            } else {
                $imagePath = null;
                $imageName = null;
            }
    
            $image = Image::create([
                'image_name' => $imageName,
                'image_path' => $imagePath,
            ]);

            return response()->json($image);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg'
            ]);
    
            $image = $request->file('image');
            $image_path = $image->store('/images');
            $image_name = $image->getClientOriginalName();
    
            $image = Image::where('id', $id)->first();
    
            if ($image) {
                Storage::delete($image['image_path']);
            }
    
            Image::where('id', $id)->update([
                'image_name' => $image_name,
                'image_path' => $image_path,
            ]);
    
            $image = Image::where('id', $id)->first()->toArray();
    
            $imageUrl = $image['image_path'] ? Storage::url($image['image_path']) : null;
    
            return response()->json([
                'id' => $image['id'],
                'image_name' => $image['image_name'],
                'image_url' => $imageUrl
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }        
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        if ($image) {
            Storage::delete($image->image_path);
        }

        $image->delete();

        return response()->json('Succesfully delete image');
    }
}
