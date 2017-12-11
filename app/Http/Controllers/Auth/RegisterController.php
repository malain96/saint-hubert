<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;

class RegisterController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        return view('auth.register');

    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'admin' => 'required',
        ]);

        User::create([
            'name' => request('name'),
            'username' => request('username'),
            'admin' => request('admin'),
            'password' => bcrypt(request('password')),
        ]);

        $request->session()->flash('alert-success', 'L\'utilisateur '. request('name') .' a bien été ajouté!');
        return redirect('/register');
    }
}
