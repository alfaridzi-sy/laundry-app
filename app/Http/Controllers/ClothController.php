<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cloth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ClothController extends Controller
{
    public function addCloth(Request $request)
    {
        $imageData = base64_decode($request->image);
        $imageName = $request->cloth_id . '.jpg';
        Storage::disk('public')->put('cloth/'.$imageName, $imageData);

        $cloth = Cloth::find($request->post('cloth_id'));

        if(!$cloth){
            $cloths = Cloth::create([
                'cloth_id' => $request->post('cloth_id'),
                'detail' => $request->post('detail'),
                'category' => $request->post('category'),
                'image' => $imageName,
                'status' => $request->post('status'),
            ]);

            return response()->json([
                'status' => 201,
                'error' => 'NULL',
                'data' => $cloths
            ]);
        }else if($cloth){
            $cloth->update([
                'cloth_id' => $request->post('cloth_id'),
                'detail' => $request->post('detail'),
                'category' => $request->post('category'),
                'image' => $imageName,
                'status' => $request->post('status'),
            ]);

            return response()->json([
                'status' => 200,
                'error' => 'NULL',
                'data' => $cloth
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'error' => 'INVALID_REQUEST',
                'data' => $cloth->errors(),
            ], 400);
        }
    }
}
