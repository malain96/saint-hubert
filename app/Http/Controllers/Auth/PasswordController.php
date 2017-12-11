<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;

class PasswordController extends Controller
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

    public function index()
    {

        return view('auth.password');

    }


    protected function patch(Request $request)
    {

        $this->validate(request(),[
            'current-password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if(Hash::check(request('current-password'), Auth::User()->password)){

            User::where("id", Auth::User()->id)->update([
                'password' => bcrypt(request('password')),
            ]);

            $request->session()->flash('alert-success', 'Le mot de passe a bien été modifié!');
            return redirect('/password');

        }else{

            $request->session()->flash('alert-danger', 'L\'ancien mot de passe n\'est pas bon!');
            return redirect('/password');

        }

    }
}
