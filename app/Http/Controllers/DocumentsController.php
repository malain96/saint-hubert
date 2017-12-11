<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hunter;
use App\Lessor;
use App\Utils\HuntersEtiquettesPDF;
use App\Utils\HuntersListPDF;
use App\Utils\HuntersAttendanceListPDF;
use App\Utils\WineBoxesListPDF;
use App\Utils\LessorsListPDF;
use App\Utils\LessorsEtiquettesPDF;


class DocumentsController extends Controller
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
     * Show the doncument index.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('documents.index');
    }


    /**
     * Show the hunters etiquettes selection.
     * @return \Illuminate\Http\Response
     */
    public function huntersEtiquettesSelection()
    {
        $hunters = Hunter::isActive()->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();
        return view('documents.huntersEtiquettes', compact('hunters'));
    }


    /**
     * Generate the etiquettes pdf file for the selected hunters.
     * @param  \Illuminate\Http\Request
     */
    public function huntersSelectedEtiquettes(Request $request)
    {
        $hunters = $request->all();
        array_shift($hunters);
        $hunters = array_values($hunters);
        $hunters = Hunter::isActive()->whereIn('id',$hunters)->get();
        $pdf = new HuntersEtiquettesPDF();
        $pdf->generate($hunters,'etiquettes_sociétaires');

    }


    /**
     * Generate the hunters etiquettes pdf file.
     */
    public function huntersEtiquettes()
    {
        $hunters = Hunter::isActive()->get();
        $pdf = new HuntersEtiquettesPDF();
        $pdf->generate($hunters,'etiquettes_sociétaires');

    }


    /**
     * Generate the hunters list pdf file.
     */
    public function huntersList()
    {
        $hunters = Hunter::isActive()->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();
        $pdf = new HuntersListPDF();
        $pdf->setLeftHeader(request('season'));
        $pdf->generate($hunters,'liste_sociétaires');

    }


    /**
     * Generate the hunters list pdf file.
     */
    public function huntersAttendanceList()
    {

        $hunters = Hunter::isActive()->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();
        $pdf = new HuntersAttendanceListPDF();
        $pdf->setLeftHeader(request('header'));
        $pdf->generate($hunters,'liste_présence');

    }


    /**
     * Generate the wine box list pdf file.
     */
    public function wineBoxesList()
    {

        $hunters = Hunter::isActive()->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();
        $pdf = new WineBoxesListPDF();
        $pdf->setLeftHeader(request('season'));
        $pdf->generate($hunters,'caisses_vin');

    }


    /**
     * Generate the lessors list pdf file.
     */
    public function lessorsList()
    {
        $lessors = Lessor::isValid()->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();
        $pdf = new LessorsListPDF();
        $pdf->setLeftHeader(request('season'));
        $pdf->generate($lessors,'liste_sociétaires');

    }

    /**
     * Show the lessors etiquettes selection.
     * @return \Illuminate\Http\Response
     */
    public function lessorsEtiquettesSelection()
    {
        $lessors = Lessor::isValid()->orderBy('lastName', 'asc')->orderBy('firstName', 'asc')->get();
        return view('documents.lessorsEtiquettes', compact('lessors'));
    }

    /**
     * Generate the etiquettes pdf file for the selected lessors.
     * @param  \Illuminate\Http\Request
     */
    public function lessorsSelectedEtiquettes(Request $request)
    {
        $lessors = $request->all();
        array_shift($lessors);
        $lessors = array_values($lessors);
        $lessors = Lessor::isValid()->whereIn('id', $lessors)->get();
        $pdf = new LessorsEtiquettesPDF();
        $pdf->generate($lessors,'etiquettes_bailleurs');

    }

    /**
     * Generate the lessors etiquettes pdf file.
     */
    public function lessorsEtiquettes()
    {
        $lessors = Lessor::isValid()->get();
        $pdf = new LessorsEtiquettesPDF();
        $pdf->generate($lessors,'etiquettes_bailleurs');

    }

}
