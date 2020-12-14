<?php

namespace App\Http\Controllers\Skincare\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GlassWare;
use App\Http\Requests\StoreGlassWare;
use Illuminate\Support\Facades\Auth;

class GlassWareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('mady-skincare/Inventory/Glassware/glassware-create');
        
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
    public function store(StoreGlassWare $request)
    {
        $validatedData = $request->validated();

        $glasswareModel = new GlassWare();

        $glasswareModel->glassware_name = $validatedData['glassware_name'];
        $glasswareModel->stock_in_hand = $validatedData['stock_in_hand'];
        $glasswareModel->breakge = $validatedData['breakge'];
        $glasswareModel->responsible_person = $validatedData['responsible_person'];
    
        $glasswareModel->status = '1';
        $glasswareModel->created_by = Auth::id();


         if ($glasswareModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'GlassWare data add successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }
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
