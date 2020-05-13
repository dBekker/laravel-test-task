<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class СitiesController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){

        $city = new \App\City;
        $cities = \App\City::all();
        return view('cities', ['city' => $city, 'cities' =>  $cities]);
    }

    public function store(Request $request) {

        $responce = ['errCode' => 0, 'data' => null];
        $data = $request->all();
        $city = new \App\City;
        $city->fill($data);
        if(!$city->save()) {
            $responce['errCode'] = 1;
        } else {
            $responce['data'] = $city;
        }

        return $responce;
    }
}