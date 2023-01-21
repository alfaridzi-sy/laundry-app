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
        $validator = Validator::make($request->all(), [
            'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 500,
                'error' => 'SYSTEM_ERROR',
                'data' => $validator->messages()->first(),
            ], 500);
            return sendCustomResponse($validator->messages()->first(),  'error', 500);
        }

        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            $request->image->storeAs('cloth', $image, 'public');
        }
        $cloth = Cloth::find($request->post('cloth_id'));

        if(!$cloth){
            $cloths = Cloth::create([
                'cloth_id' => $request->post('cloth_id'),
                'detail' => $request->post('detail'),
                'category' => $request->post('category'),
                'image' => $image,
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
                'image' => $image,
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
