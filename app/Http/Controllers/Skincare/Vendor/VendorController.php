<?php

namespace App\Http\Controllers\SKincare\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Http\Requests\StoreVendor;
use App\Http\Requests\UpdateVendor;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class VendorController extends Controller
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
        return \View::make('mady-skincare.Vendors.vendors-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return \View::make('mady-skincare.Vendors.vendor-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendor $request)
    {
        $validatedData = $request->validated();

        $vendorModel = new Vendor();

        $vendorModel->vendor_type = $validatedData['vendor_type'];
        $vendorModel->vendor_name = $validatedData['vendor_name'];
        $vendorModel->phoneNo = $validatedData['phoneNo'];
        $vendorModel->address = $validatedData['address'];

        $vendorModel->status = '1';
        $vendorModel->created_by = Auth::id();


         if ($vendorModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'vendor data add successfully'] , 200);
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
        $getSingleData = Vendor::find($id);
        // return $getSingleData->id;

        return \View::make('mady-skincare/Vendors/vendor-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendor $request, $id)
    {
      $validatedData = $request->validated();

      $findData = Vendor::find($id);

      $findData->vendor_type = $validatedData['vendor_type'];
      $findData->vendor_name = $validatedData['vendor_name'];
      $findData->phoneNo = $validatedData['phoneNo'];
      $findData->address = $validatedData['address'];

      $findData->status = '1';
      $findData->created_by = Auth::id();


       if ($findData->save()) {
          return response()->json(['status'=>'true' , 'message' => 'vendor data updated successfully'] , 200);
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
        $deleteData = Vendor::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'costing data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }

    // ****************************** get all vendors ************************

    public function datatable()
    {
        return \response()->json(Vendor::orderBy('id')->get() , 200);

    }

    // ****************** get all vendor ***********************

    public function select2(Request $request)
    {
        return response()->json(Vendor::where('vendor_name','like',"%$request->searchTerm%")->get(['id' , 'vendor_name']));
        
    }
}
