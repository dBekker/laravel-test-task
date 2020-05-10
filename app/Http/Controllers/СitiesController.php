<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class СitiesController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){

        return view('cities');
    }
}
