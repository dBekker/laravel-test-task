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
        //dd($city);
        return view('cities', ['city' => $city ]);
    }

    public function add() {
        return 'ok';
    }
}