<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\Cloth;

class LaundryController extends Controller
{
    public function addLaundry(Request $request)
    {
        $cloths = $request->clothes;
        $cloths_encode = '';
        $cloths_counter = 0;

        foreach($cloths as $i => $cloth) {
            if ($cloths_counter === count($cloths) - 1) {
                $cloths_encode .= $cloth;
            } else{
                $cloths_encode .= $cloth.',';
            }
            $cloths_counter++;
        }

        $laundries = Laundry::create([
            'laundry_id' => $request->post('laundry_id'),
            'name' => $request->post('name'),
            'finish_date' => $request->post('finish_date'),
            'price' => $request->post('price'),
            'status' => $request->post('status'),
            'clothes' => $cloths_encode,
            'customer_name' => $request->post('customer_name'),
            'customer_address' => $request->post('customer_address'),
            'customer_phone_number' => $request->post('customer_phone_number'),
        ]);

        if($laundries){
            return response()->json([
                'status' => 201,
                'error' => 'NULL',
                'data' => $laundries
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'error' => 'INVALID_REQUEST',
                'data' => $laundries->errors(),
            ], 400);
        }
    }

    public function getDateByID(Request $request){
        $laundry = Laundry::find($request->post('laundry_id'));
        if($laundry){
            return response()->json([
                'status' => 200,
                'error' => 'NULL',
                'data' => $laundry->finish_date
            ]);
        }else if(!$laundry){
            return response()->json([
                'status' => 404,
                'error' => 'LAUNDRY_NOT_FOUND',
                'data' => null,
            ], 404);
        }else{
            return response()->json([
                'status' => 400,
                'error' => 'INVALID_REQUEST',
                'data' => $laundry->errors(),
            ], 400);
        }
    }

    public function liveReport($laundry_id){

        $cloths_data = array();
        $laundry = Laundry::find($laundry_id);
        $id = ((string) $laundry_id);
        $clothes = explode(',',$laundry->clothes);
        foreach($clothes as $c){
            $cloth = Cloth::find($c);
            array_push($cloths_data, $cloth);
        }
        $laundry->cloths = $cloths_data;
        $laundry->id = $id;
        return view('live_report',["laundries" => $laundry]);
    }

    public function changeDate(Request $request, $laundry_id){
        $cloths_data = array();
        $laundry = Laundry::find($laundry_id);
        $id = ((string) $laundry_id);
        $laundry->update([
            'finish_date' => $request->post('finish_date'),
        ]);
        $clothes = explode(',',$laundry->clothes);
        foreach($clothes as $c){
            $cloth = Cloth::find($c);
            array_push($cloths_data, $cloth);
        }
        $laundry->cloths = $cloths_data;
        $laundry->id = $id;
        return view('live_report',["laundries" => $laundry]);
    }
}
