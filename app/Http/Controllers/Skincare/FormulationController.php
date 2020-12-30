<?php

namespace App\Http\Controllers\Skincare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFormulation;
use App\Http\Requests\UpdateFormulation;
use App\Models\Formulation;
use Illuminate\Support\Facades\Auth;
use JavaScript;
class FormulationController extends Controller
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
        return \View::make('mady-skincare.Formulation.formulation-list');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('mady-skincare.Formulation.formulation-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormulation $request)
    {
        $validatedData = $request->validated();

        $formulationModel = new Formulation();

        $formulationModel->formulation_name = $validatedData['formulation_name'];
        $formulationModel->ingredient_name = $validatedData['ingredient_name'];
        $formulationModel->quantity = $validatedData['quantity'];
        $formulationModel->equipment_used = $validatedData['equipment_used'];
        $formulationModel->procedure = $validatedData['procedure'];
        $formulationModel->container_used = $validatedData['container_used'];
        $formulationModel->label_type_used = $validatedData['label_type_used'];
        $formulationModel->pack_size = $validatedData['pack_size'];
        $formulationModel->status = '1';
        $formulationModel->created_by = Auth::id();


         if ($formulationModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Formulation data add successfully'] , 200);
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
        $getSingleData = Formulation::find($id);
        // return $getSingleData->id;

        return \View::make('mady-skincare/Formulation/Formulation-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormulation $request, $id)
    {
        $validatedData = $request->validated();

        $findData = Formulation::find($id);

        $findData->formulation_name = $validatedData['formulation_name'];
        $findData->ingredient_name = $validatedData['ingredient_name'];
        $findData->quantity = $validatedData['quantity'];
        $findData->equipment_used = $validatedData['equipment_used'];
        $findData->procedure = $validatedData['procedure'];
        $findData->container_used = $validatedData['container_used'];
        $findData->label_type_used = $validatedData['label_type_used'];
        $findData->pack_size = $validatedData['pack_size'];
        $findData->status = '1';
        $findData->created_by = Auth::id();


         if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Formulation data add successfully'] , 200);
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
        $deleteData = Formulation::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'Formulation data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }
    public function datatable()
    {
        return \response()->json(Formulation::orderBy('id')->get() , 200);
        # code...
    }
}
