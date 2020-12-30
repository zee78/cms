<?php

namespace App\Http\Controllers\SKincare\PurchaseOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use App\Models\Order;
use App\Models\Vendor;
// use App\User;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Config;
use JavaScript;

class PurchaseOrderController extends Controller
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

        return \View::make('mady-skincare.PurchaseOrder.purchase-order-lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('mady-skincare.PurchaseOrder.purchase-order-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
        $validatedData = $request->validated();

        $orderModel = new Order();

        $orderModel->order_id = IdGenerator::generate(['table' => 'orders', 'length' => 13, 'field' => 'order_id', 'prefix' => 'INV-']);
        $orderModel->vendor_id = $validatedData['vendor_name'];
        $orderModel->order_type = $validatedData['vendor_type'];
        $orderModel->order_placed_by = $validatedData['placed_by'];
        $orderModel->order_date = $validatedData['date'];
        $orderModel->cost = $validatedData['cost'];
        $orderModel->order_procurement_by = $validatedData['procurement_person'];
        $orderModel->order_receiving_date = $validatedData['receiving_date'];
        $orderModel->order_status = Config::get('constants.status_pending');
        $orderModel->status = '1';
        $orderModel->created_by = Auth::id();


        if ($orderModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Order data add successfully'] , 200);
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
        $getSingleData = Order::find($id);
        // return $getSingleData->id;

        return \View::make('mady-skincare/PurchaseOrder/purchase-order-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $request, $id)
    {
        $validatedData = $request->validated();

        $findData = Order::find($id);

        $findData->order_id = IdGenerator::generate(['table' => 'orders', 'length' => 13, 'field' => 'order_id', 'prefix' => 'INV-']);
        $findData->vendor_id = $validatedData['vendor_name'];
        $findData->order_type = $validatedData['vendor_type'];
        $findData->order_placed_by = $validatedData['placed_by'];
        $findData->order_date = $validatedData['date'];
        $findData->cost = $validatedData['cost'];
        $findData->order_procurement_by = $validatedData['procurement_person'];
        $findData->order_receiving_date = $validatedData['receiving_date'];
        $findData->order_status = Config::get('constants.status_pending');
        $findData->status = '1';
        $findData->created_by = Auth::id();


        if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Order data updated successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }

        return $validatedData;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = PurchaseOrder::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'purchase order data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }

    // ***************** get all data ***************

    public function datatable()
    {
        return \response()->json(Order::with('Vendor' , 'user')->orderBy('id')->get() , 200);
        
    }

    // *********************************** change order stsus ***************

    public function changeOrderStatus(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'orderStatus' =>'required',
            'orderId' =>'required|numeric',
        ]);

        // return $validatedData;

        $orderFindModel = Order::find($validatedData['orderId']);

        $orderFindModel->user_id = Auth::id();
        $orderFindModel->order_status = $validatedData['orderStatus'];

        if ($orderFindModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'order status update successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }


    }
}
