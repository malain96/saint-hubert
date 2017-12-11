<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hunter;
use App\Title;
use App\Address;
use App\PostalCode;
use App\City;


class HuntersController extends Controller
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
     * Show the hunters index.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //retrieve all hunters
        $hunters = Hunter::get();
        return view('hunters.index', compact('hunters'));

    }


    /**
     * Show a hunter.
     * @param Hunter
     * @return \Illuminate\Http\Response
     */
    public function show(Hunter $hunter)
    {

        //retrieve all titles
        $titles = Title::all();
        return view('hunters.show', compact('hunter','titles'));

    }


    /**
     * Show the edit page for a hunter.
     * @param Hunter
     * @return \Illuminate\Http\Response
     */
    public function edit(Hunter $hunter)
    {

        //retrieve all titles
        $titles = Title::all();
        return view('hunters.edit', compact('hunter','titles'));

    }


    /**
     * Patch a hunter in the database and redirect to hunters.
     * @param Hunter
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function patch(Hunter $hunter, Request $request)
    {

        //Validate all required data
        $this->validate(request(),[
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'postalCode' => 'required|min:5|max:5',
            'city' => 'required',
        ]);

        //Retrieve or create the postal code
        $postalCode = PostalCode::firstOrCreate(['label' => request('postalCode')]);

        //Retrieve or create the city
        $city = City::firstOrCreate(['label' => strtoupper(request('city'))], ['postal_code_id' => $postalCode->id]);

        //Update the address
        Address::where("id", $hunter->address->id)->update([
            'label' => request('address'),
            'city_id' => $city->id,
        ]);

        //Update the hunter
        Hunter::where("id", $hunter->id)->update([
            'title_id' => request('title'),
            'firstName' => request('firstName'),
            'lastName' => strtoupper(request('lastName')),
            'active' => request('active')
        ]);

        $request->session()->flash('alert-success', 'Le sociétaire  n°'.$hunter->id.', '.request('firstName').' '.strtoupper(request('lastName')).' a bien été modifié!');
        return redirect('/hunters');

    }


    /**
     * Show the hunter creation page.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Retrieve all titles
        $titles = Title::all();
        return view('hunters.create',compact('titles'));

    }


    /**
     * Add a hunter to the database and redirect to hunters.
     * @param Hunter
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validate all required data
        $this->validate(request(),[
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'postalCode' => 'required|min:5|max:5',
            'city' => 'required',
        ]);

        //Retrieve or create the postal code
        $postalCode = PostalCode::firstOrCreate(['label' => request('postalCode')], ['label' => request('postalCode')]);

        //Retrieve or create the city
        $city = City::firstOrCreate(['label' => strtoupper(request('city'))], ['postal_code_id' => $postalCode->id]);

        //Create the address
        $address = Address::create([
            'label' => request('address'),
            'city_id' => $city->id,
        ]);

        //Create the hunter
        $hunter = Hunter::create([
            'title_id' => request('title'),
            'firstName' => request('firstName'),
            'lastName' => strtoupper(request('lastName')),
            'active' => request('active'),
            'address_id' => $address->id
        ]);

        $request->session()->flash('alert-success', 'Le sociétaire  n°'.$hunter->id.', '.$hunter->firstName.' '.$hunter->lastName.' a bien été ajouté!');
        return redirect('/hunters');

    }


    /**
     * Show the hunter deletion page.
     * @param Hunter
     * @return \Illuminate\Http\Response
     */
    public function deleteConfirm(Hunter $hunter)
    {

        return View('hunters.delete', compact('hunter'));

    }


    /**
     * Delete a hunter from the database and redirect to hunters.
     * @param Hunter
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function delete(Hunter $hunter,Request $request)
    {

        //Delete the hunter
        Hunter::where('id', $hunter->id)->delete();
        $request->session()->flash('alert-success', 'Le sociétaire  n°'.$hunter->id.', '.$hunter->firstName.' '.$hunter->lastName.' a bien été supprimé!');
        return redirect('/hunters');

    }

}
