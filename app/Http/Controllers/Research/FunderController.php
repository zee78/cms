<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFunder;
use App\Http\Requests\UpdateFunder;
use App\Models\Funder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use JavaScript;

class FunderController extends Controller
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
        return \View::make('research/Funders/funder-list');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('research/Funders/funder-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFunder $request)
    {
        $validatedData = $request->validated();

        $funderModel = new Funder();

        $funderModel->funder_id = IdGenerator::generate(['table' => 'funders', 'length' => 13, 'field' => 'funder_id', 'prefix' => 'FUNDR-']);
        $funderModel->funding_organization_name = $validatedData['funding_organization_name'];
        $funderModel->website = $validatedData['website'];
        $funderModel->email = $validatedData['email'];
        $funderModel->phoneNo = $validatedData['phoneNo'];
        $funderModel->team_lead = $validatedData['team_lead'];
        $funderModel->funder_status = $validatedData['status'];
        $funderModel->response = $validatedData['response'];
        $funderModel->status = '1';
        $funderModel->approve_by = '0';
        $funderModel->approval_status = Config::get('constants.status_pending');
        $funderModel->created_by = Auth::id();

        if ($funderModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Funder data add successfully'] , 200);
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
        $getSingleData = Funder::find($id);
        // return $getSingleData->id;

        return \View::make('research/Funders/funder-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFunder $request, $id)
    {
        $validatedData = $request->validated();

        $findData = Funder::find($id);

        $findData->funding_organization_name = $validatedData['funding_organization_name'];
        $findData->website = $validatedData['website'];
        $findData->email = $validatedData['email'];
        $findData->phoneNo = $validatedData['phoneNo'];
        $findData->team_lead = $validatedData['team_lead'];
        $findData->funder_status = $validatedData['status'];
        $findData->response = $validatedData['response'];
        $findData->status = '1';
        $findData->updated_by = Auth::id();

        if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'funder updated successfully'] , 200);
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
        $deleteData = Funder::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'Funder data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }
    public function datatable()
    {
        return \response()->json(Funder::orderBy('id')->get() , 200);
        # code...
    }

    public function changeStatus(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'orderStatus' =>'required',
            'orderId' =>'required|numeric',
        ]);

        // return $validatedData;

        $funderFindModel = Funder::find($validatedData['orderId']);

        $funderFindModel->approve_by = Auth::id();
        $funderFindModel->approval_status = $validatedData['orderStatus'];

        if ($funderFindModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Funder status update successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }
    }

    // *************************** select2 *****************************

    public function select2(Request $request)
    {
        return response()->json(Funder::where('funding_organization_name','like',"%$request->searchTerm%")->
                                where('approval_status',Config::get('constants.status_approve'))->
                                get(['id' , 'funding_organization_name']));
        # code...
    }
}
