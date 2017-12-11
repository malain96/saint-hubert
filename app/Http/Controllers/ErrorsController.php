<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lessor;
use App\Title;
use App\Address;
use App\PostalCode;
use App\City;

class ErrorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the 404 Error page.
     * @return \Illuminate\Http\Response
     */
    public function error404()
    {
        return view('errorsPage.error404');
    }


    /**
     * Show the errors page.
     * @return \Illuminate\Http\Response
     */
    public function errors()
    {
        return view('errorsPage.errors');
    }
}
