<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lessor;
use App\Title;
use App\Address;
use App\PostalCode;
use App\City;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     * The user has to be authenticated
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessors = Lessor::LastYear()->get();
        return view('home', compact('lessors'));
    }
}
