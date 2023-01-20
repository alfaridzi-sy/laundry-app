<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cloth;

class ClothController extends Controller
{
    public function addCloth(Request $request)
    {
        $cloth = Cloth::find($request->post('cloth_id'));

        if(!$cloth){
            $cloths = Cloth::create([
                'cloth_id' => $request->post('cloth_id'),
                'detail' => $request->post('detail'),
                'category' => $request->post('category'),
                'image' => $request->post('image'),
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
                'image' => $request->post('image'),
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
