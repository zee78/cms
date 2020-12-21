<?php

namespace App\Http\Controllers\Skincare\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoldStatus;
use App\Http\Requests\StoreSoldStatus;
use Illuminate\Support\Facades\Auth;

class SoldStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('mady-skincare/Inventory/SoldStatus/sold-status-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('mady-skincare/Inventory/SoldStatus/sold-status-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoldStatus $request)
    {
        $validatedData = $request->validated();

        $soldStatusModel = new SoldStatus();

        $soldStatusModel->product_name = $validatedData['product_name'];
        $soldStatusModel->date = $validatedData['date'];
        $soldStatusModel->packs_sold = $validatedData['packs_sold'];
        $soldStatusModel->packs_in_hand = $validatedData['packs_in_hand'];
        $soldStatusModel->amount_received = $validatedData['amount_received'];
    
        $soldStatusModel->status = '1';
        $soldStatusModel->created_by = Auth::id();


         if ($soldStatusModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'sold status data add successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }    }

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
        $deleteData = SoldStatus::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'sold status data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }

       // ********************* get all batch data datatable ****************

    public function datatable()
    {
        return \response()->json(SoldStatus::all() , 200);
        
    }
}
