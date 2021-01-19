<?php

namespace App\Http\Controllers\SKincare\Costing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Costing;
use App\Http\Requests\StoreCosting;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateCosting;
use JavaScript;
class CostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('mady-skincare.Costing.costing-lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('mady-skincare.Costing.costing-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCosting $request)
    {
        $validatedData = $request->validated();

        $costingModel = new Costing();

        $costingModel->product_name = $validatedData['product_name'];
        $costingModel->ingredient_name = $validatedData['ingredient_name'];
        $costingModel->quantity_used = $validatedData['quantity_used'];
        $costingModel->container_name = $validatedData['container_name'];
        $costingModel->container_cost = $validatedData['container_cost'];
        $costingModel->sticker_cost = $validatedData['sticker_cost'];
        $costingModel->box_cost = $validatedData['box_cost'];
        $costingModel->bag_cost = $validatedData['bag_cost'];
        $costingModel->total_direct_cost = $validatedData['total_direct_cost'];
        $costingModel->gst = $validatedData['gst'];
        $costingModel->marketing_cost = $validatedData['marketing_cost'];
        $costingModel->profit_percentage = $validatedData['profit_percentage'];
        $costingModel->profit_amount = $validatedData['profit_amount'];
        $costingModel->market_retail_price = $validatedData['market_retail_price'];
        $costingModel->status = '1';


        if ($costingModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'costing data add successfully'] , 200);
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
        $getSingleData = Costing::find($id);
        // return $getSingleData->id;

        return \View::make('mady-skincare/Costing/costing-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCosting $request, $id)
    {
        $validatedData = $request->validated();

        $findData = Costing::find($id);
        
        $findData->product_name = $validatedData['product_name'];
        $findData->ingredient_name = $validatedData['ingredient_name'];
        $findData->quantity_used = $validatedData['quantity_used'];
        $findData->container_name = $validatedData['container_name'];
        $findData->container_cost = $validatedData['container_cost'];
        $findData->sticker_cost = $validatedData['sticker_cost'];
        $findData->box_cost = $validatedData['box_cost'];
        $findData->bag_cost = $validatedData['bag_cost'];
        $findData->total_direct_cost = $validatedData['total_direct_cost'];
        $findData->gst = $validatedData['gst'];
        $findData->marketing_cost = $validatedData['marketing_cost'];
        $findData->profit_percentage = $validatedData['profit_percentage'];
        $findData->profit_amount = $validatedData['profit_amount'];
        $findData->market_retail_price = $validatedData['market_retail_price'];
        $findData->status = '1';


        if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'costing data updated successfully'] , 200);
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
        $deleteData = Costing::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'costing data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }
    public function datatable()
    {
        return \response()->json(Costing::orderBy('id')->get() , 200);
        # code...
    }
}
