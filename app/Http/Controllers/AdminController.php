<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addResearch(Request $request){
        // return \View::make('research/research-task');
    }

    public function add_funders(Request $request){
        // return \View::make('research/potential-funder');
    }

    public function training_form(Request $request){
        // return \View::make('research/training-form');
    }

    public function add_formulation(Request $request){
        // return \View::make('mady-skincare/add-formulation');
    }

    public function add_chemicals(Request $request){
        // return \View::make('mady-skincare/add-chemicals');
    }

    public function add_glassware(Request $request){
        // return \View::make('mady-skincare/add-glassware');
    }

    public function add_equipment(Request $request){
        // return \View::make('mady-skincare/add-equipment');
    }

    public function add_batch(Request $request){
        // return \View::make('mady-skincare/add-batch');
    }

    public function add_sold_status(Request $request){
        // return \View::make('mady-skincare/add-sold-status');
    }

    public function add_vendors(Request $request){
        return \View::make('mady-skincare/add-vendors');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return \View::make('index'); 
     //   return view($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
