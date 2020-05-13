<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Сities;

class СitiesController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){

        $city = new Сities;
        $cities = Сities::all();
        return view('cities', ['city' => $city, 'cities' =>  $cities]);
    }

    public function store(Request $request) {

        $responce = ['errCode' => 0, 'data' => null];
        $data = $request->all();
        $city = new Сities;
        $city->fill($data);
        if(!$city->save()) {
            $responce['errCode'] = 1;
        } else {
            $responce['data'] = $city;
        }

        return $responce;
    }
}