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
        return view('cities', ['city' => $city ]);
    }

    public function store(Request $request) {

        $errcode = 0;
        $data = $request->all();
        $city = new Сities;
        $city->fill($data);
        if(!$city->save()) {
            $errcode = 1;
        }
        return $errcode;
    }
}