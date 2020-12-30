<?php

namespace App\Http\Controllers\Skincare\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Http\Requests\StoreBatch;
use App\Http\Requests\UpdateBatch;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class BatchController extends Controller
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
        return \View::make('mady-skincare/Inventory/Batch/batchs-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('mady-skincare/Inventory/Batch/batch-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBatch $request)
    {
        $validatedData = $request->validated();

        $batchModel = new Batch();

        $batchModel->batch_code = $validatedData['batch_code'];
        $batchModel->product_name = $validatedData['product_name'];
        $batchModel->batch_size = $validatedData['batch_size'];
        $batchModel->total_quantity = $validatedData['total_quantity'];
    
        $batchModel->status = '1';
        $batchModel->created_by = Auth::id();


         if ($batchModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'batch data add successfully'] , 200);
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
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getSingleData = Batch::find($id);
        // return $getSingleData->id;

        return \View::make('mady-skincare/Inventory/Batch/batch-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBatch $request, $id)
    {
        $validatedData = $request->validated();

        $findData = Batch::find($id);

        $findData->batch_code = $validatedData['batch_code'];
        $findData->product_name = $validatedData['product_name'];
        $findData->batch_size = $validatedData['batch_size'];
        $findData->total_quantity = $validatedData['total_quantity'];
    
        $findData->status = '1';
        $findData->updated_by = Auth::id();

        if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'batch data updated successfully'] , 200);
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
        $deleteData = Batch::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'batch data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }

    // ********************* get all batch data datatable ****************

    public function datatable()
    {
        return \response()->json(Batch::all() , 200);
        
    }
}
