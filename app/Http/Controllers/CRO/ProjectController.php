<?php

namespace App\Http\Controllers\CRO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCroProject;
use App\Http\Requests\UpdateCroProject;
use App\Models\CroProject;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Config;
use JavaScript;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
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
        return \View::make('Cro/project-lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('Cro/project-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCroProject $request)
    {
        $validatedData = $request->validated();

        $croProjectModel = new CroProject();

        $croProjectModel->project_id = IdGenerator::generate(['table' => 'cro_projects', 'length' => 13, 'field' => 'project_id', 'prefix' => 'PROJ-']);
        $croProjectModel->funder_id = $validatedData['funder_name'];
        $croProjectModel->project_type = $validatedData['project_type'];
        $croProjectModel->title = $validatedData['title'];
        $croProjectModel->funder_type = $validatedData['funder_type'];
        $croProjectModel->amount = $validatedData['amount'];
        $croProjectModel->start_date = $validatedData['start_date'];
        $croProjectModel->end_date = $validatedData['end_date'];
        $croProjectModel->team_lead = $validatedData['team_lead'];
        $croProjectModel->team_members = $validatedData['team_members'];
        $croProjectModel->order_status = Config::get('constants.status_process');
        $croProjectModel->status = '1';
        $croProjectModel->created_by = Auth::id();


        if ($croProjectModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Project data add successfully'] , 200);
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
        $getSingleData = CroProject::find($id);
        // return $getSingleData->id;

        return \View::make('Cro/project-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCroProject $request, $id)
    {
        $validatedData = $request->validated();

        $findData = CroProject::find($id);

        $findData->project_id = IdGenerator::generate(['table' => 'cro_projects', 'length' => 13, 'field' => 'project_id', 'prefix' => 'PROJ-']);
        $findData->funder_id = $validatedData['funder_name'];
        $findData->project_type = $validatedData['project_type'];
        $findData->title = $validatedData['title'];
        $findData->funder_type = $validatedData['funder_type'];
        $findData->amount = $validatedData['amount'];
        $findData->start_date = $validatedData['start_date'];
        $findData->end_date = $validatedData['end_date'];
        $findData->team_lead = $validatedData['team_lead'];
        $findData->team_members = $validatedData['team_members'];
        $findData->order_status = Config::get('constants.status_process');
        $findData->status = '1';
        $findData->created_by = Auth::id();


        if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Project data update successfully'] , 200);
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
        $deleteData = CroProject::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'Cro Project data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }

    public function changeStatus(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'orderStatus' =>'required',
            'orderId' =>'required|numeric',
        ]);

        // return $validatedData;

        $croFindModel = CroProject::find($validatedData['orderId']);

        // $funderFindModel->approve_by = Auth::id();
        $croFindModel->order_status = $validatedData['orderStatus'];

        if ($croFindModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Project status update successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }
    }

    public function datatable()
    {
        return \response()->json(CroProject::with('funder')->orderBy('id')->get() , 200);
        # code...
    }
}
