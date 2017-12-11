<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lessor;
use App\Title;
use App\Address;
use App\PostalCode;
use App\City;


class LessorsController extends Controller
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
     * Show the lessors index.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //retrieve all lessors
        $lessors = Lessor::get();
        return view('lessors.index', compact('lessors'));

    }


    /**
     * Show a lessor.
     * @param Lessor
     * @return \Illuminate\Http\Response
     */
    public function show(Lessor $lessor)
    {

        //retrieve all titles
        $titles = Title::all();
        return view('lessors.show', compact('lessor','titles'));

    }


    /**
     * Show the edit page for a lessor.
     * @param Lessor
     * @return \Illuminate\Http\Response
     */
    public function edit(Lessor $lessor)
    {

        //retrieve all titles
        $titles = Title::all();
        return view('lessors.edit', compact('lessor','titles'));

    }


    /**
     * Patch a lessor in the database and redirect to lessors.
     * @param Lessor
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function patch(Lessor $lessor, Request $request)
    {

        //Validate all required data
        $this->validate(request(),[
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'postalCode' => 'required|min:5|max:5',
            'city' => 'required',
            'hectares' => 'required',
            'price' => 'required',
            'validityDate' => 'required|min:4|max:4',
        ]);

        //Check if the validity date is inferior to this year
        if(request('validityDate' ) < date('Y')){
            $request->session()->flash('alert-danger', 'La date de validité doit être suppérieur à '. date('Y'));
            return redirect('/lessors/' . $lessor->id . '/edit');
        }

        //Retrieve or create the postal code
        $postalCode = PostalCode::firstOrCreate(['label' => request('postalCode')]);

        //Retrieve or create the city
        $city = City::firstOrCreate(['label' => strtoupper(request('city'))], ['postal_code_id' => $postalCode->id]);

        //Update the address
        Address::where("id", $lessor->address->id)->update([
            'label' => request('address'),
            'city_id' => $city->id,
        ]);

        //Update the lesser
        Lessor::where("id", $lessor->id)->update([
            'title_id' => request('title'),
            'firstName' => request('firstName'),
            'lastName' => strtoupper(request('lastName')),
            'hectares' => request('hectares'),
            'price' => request('price'),
            'validityDate' => request('validityDate')
        ]);

        $request->session()->flash('alert-success', 'Le bailleur  n°'.$lessor->id.', '.request('firstName').' '.strtoupper(request('lastName')).' a bien été modifié!');
        return redirect('/lessors');

    }


    /**
     * Show the lessor creation page.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Retrieve all titles
        $titles = Title::all();
        return view('lessors.create',compact('titles'));

    }


    /**
     * Add a lessor to the database and redirect to lessors.
     * @param Lessor
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
            'hectares' => 'required',
            'price' => 'required',
            'validityDate' => 'required|min:4|max:4',
        ]);

        //Check if the validity date is inferior to this year
        if(request('validityDate' ) < date('Y')){
            $request->session()->flash('alert-danger', 'La date de validité doit être suppérieur à '. date('Y'));
            return redirect('/lessors/create');
        }

        //Retrieve or create the postal code
        $postalCode = PostalCode::firstOrCreate(['label' => request('postalCode')], ['label' => request('postalCode')]);

        //Retrieve or create the city
        $city = City::firstOrCreate(['label' => strtoupper(request('city'))], ['postal_code_id' => $postalCode->id]);

        //Create the address
        $address = Address::create([
            'label' => request('address'),
            'city_id' => $city->id,
        ]);

        //Create  the lessor
        $lessor = Lessor::create([
            'title_id' => request('title'),
            'firstName' => request('firstName'),
            'lastName' => strtoupper(request('lastName')),
            'hectares' => request('hectares'),
            'price' => request('price'),
            'validityDate' => request('validityDate'),
            'address_id' => $address->id

        ]);

        $request->session()->flash('alert-success', 'Le bailleur  n°'.$lessor->id.', '.$lessor->firstName.' '.$lessor->lastName.' a bien été ajouté!');
        return redirect('/lessors');

    }


    /**
     * Show the lessor deletion page.
     * @param Lessor
     * @return \Illuminate\Http\Response
     */
    public function deleteConfirm(Lessor $lessor)
    {

        return View('lessors.delete', compact('lessor'));

    }


    /**
     * Delete a lessor from the database and redirect to lessors.
     * @param Lessor
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function delete(Lessor $lessor,Request $request)
    {

        //Delete the lessor
        Lessor::where('id', $lessor->id)->delete();
        $request->session()->flash('alert-success', 'Le bailleur  n°'.$lessor->id.', '.$lessor->firstName.' '.$lessor->lastName.' a bien été supprimé!');
        return redirect('/lessors');

    }

}
