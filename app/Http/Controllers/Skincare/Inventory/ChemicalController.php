<?php

namespace App\Http\Controllers\Skincare\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chemical;
use App\Http\Requests\StoreChemical;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateChemical;
use JavaScript;

class ChemicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin') || Auth::id() == '1'){
            JavaScript::put([
            'role' => 'true',
           ]);
        }
        return \View::make('mady-skincare/Inventory/Chemicals/chemicals-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('mady-skincare/Inventory/Chemicals/chemical-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChemical $request)
    {
        $validatedData = $request->validated();

        $chemicalModel = new Chemical();

        $chemicalModel->chemical_name = $validatedData['chemical_name'];
        $chemicalModel->stock_in_hand = $validatedData['stock_in_hand'];
        $chemicalModel->unit_cost = $validatedData['unit_cost'];
        $chemicalModel->quantity_used = $validatedData['quantity_used'];

        $chemicalModel->usage_detail = $validatedData['usage_detail'];
        $chemicalModel->quantity_remaining = $validatedData['quantity_remaining'];
        $chemicalModel->stock_level = $validatedData['stock_level'];
        $chemicalModel->cost_chemicals_used = $validatedData['cost_chemicals_used'];

        $chemicalModel->wastage_amount = $validatedData['wastage_amount'];
        $chemicalModel->wastage_cost = $validatedData['wastage_cost'];
    
        $chemicalModel->status = '1';
        $chemicalModel->created_by = Auth::id();


         if ($chemicalModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Chemical data add successfully'] , 200);
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
        $chemicalData = Chemical::find($id);
        return \View::make('mady-skincare/Inventory/Chemicals/chemical-update' , compact('chemicalData'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChemical $request, $id)
    {
        $validatedData =  $request->validated();
        $chemicalModel = Chemical::find($id);

        $chemicalModel->chemical_name = $validatedData['chemical_name'];
        $chemicalModel->stock_in_hand = $validatedData['stock_in_hand'];
        $chemicalModel->unit_cost = $validatedData['unit_cost'];
        $chemicalModel->quantity_used = $validatedData['quantity_used'];

        $chemicalModel->usage_detail = $validatedData['usage_detail'];
        $chemicalModel->quantity_remaining = $validatedData['quantity_remaining'];
        $chemicalModel->stock_level = $validatedData['stock_level'];
        $chemicalModel->cost_chemicals_used = $validatedData['cost_chemicals_used'];

        $chemicalModel->wastage_amount = $validatedData['wastage_amount'];
        $chemicalModel->wastage_cost = $validatedData['wastage_cost'];
    
        $chemicalModel->status = '1';
        $chemicalModel->created_by = Auth::id();


         if ($chemicalModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Chemical data add successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Chemical::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'chemical data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }


       // ********************* get all batch data datatable ****************

    public function datatable()
    {
        return \response()->json(Chemical::all() , 200);
        
    }
}
