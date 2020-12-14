<?php

namespace App\Http\Controllers\Skincare\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Http\Requests\StoreEquipment;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('mady-skincare/Inventory/Equipment/equipment-create');
        
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
    public function store(StoreEquipment $request)
    {
        $validatedData = $request->validated();

        $equipmentModel = new Equipment();

        $equipmentModel->quipment_name = $validatedData['quipment_name'];
        $equipmentModel->equipment_number = $validatedData['equipment_number'];
        $equipmentModel->functional_status = $validatedData['functional_status'];
        $equipmentModel->hours_used = $validatedData['hours_used'];

        $equipmentModel->start_time = $validatedData['start_time'];
        $equipmentModel->end_time = $validatedData['end_time'];
        $equipmentModel->maintenance_date = $validatedData['maintenance_date'];
        $equipmentModel->due_date = $validatedData['due_date'];
    
        $equipmentModel->status = '1';
        $equipmentModel->created_by = Auth::id();


         if ($equipmentModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'equipment data add successfully'] , 200);
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
