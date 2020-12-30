<?php

namespace App\Http\Controllers\CommunityAwareness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommunityProject;
use App\Http\Requests\UpdateCommunityProject;
use App\Models\CommunityProject;
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
        return \View::make('Community-awareness/project-lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('Community-awareness/project-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunityProject $request)
    {
        $validatedData = $request->validated();

        $communityProjectModel = new CommunityProject();

        $communityProjectModel->project_id = IdGenerator::generate(['table' => 'community_projects', 'length' => 13, 'field' => 'project_id', 'prefix' => 'PROJ-']);
        $communityProjectModel->project_name = $validatedData['project_name'];
        $communityProjectModel->team_lead = $validatedData['team_lead'];
        $communityProjectModel->team_members = $validatedData['team_members'];
        $communityProjectModel->start_date = $validatedData['start_date'];
        $communityProjectModel->end_date = $validatedData['end_date'];
        $communityProjectModel->monthly_progress = $validatedData['start_date'];
        $communityProjectModel->order_status = Config::get('constants.status_process');
        $communityProjectModel->status = '1';
        $communityProjectModel->created_by = Auth::id();


        if ($communityProjectModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'community Project data add successfully'] , 200);
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
        $getSingleData = CommunityProject::find($id);
        // return $getSingleData->id;

        return \View::make('Community-awareness/project-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommunityProject $request, $id)
    {
        $validatedData = $request->validated();

        $findData = CommunityProject::find($id);

        $findData->project_id = IdGenerator::generate(['table' => 'community_projects', 'length' => 13, 'field' => 'project_id', 'prefix' => 'PROJ-']);
        $findData->project_name = $validatedData['project_name'];
        $findData->team_lead = $validatedData['team_lead'];
        $findData->team_members = $validatedData['team_members'];
        $findData->start_date = $validatedData['start_date'];
        $findData->end_date = $validatedData['end_date'];
        $findData->monthly_progress = $validatedData['start_date'];
        $findData->order_status = Config::get('constants.status_process');
        $findData->status = '1';
        $findData->created_by = Auth::id();

        if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'community Project updated add successfully'] , 200);
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
        $deleteData = CommunityProject::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'Community Project data deleted successfully'] , 200);

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

        $funderFindModel = CommunityProject::find($validatedData['orderId']);

        // $funderFindModel->approve_by = Auth::id();
        $funderFindModel->order_status = $validatedData['orderStatus'];

        if ($funderFindModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Project status update successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }
    }
    public function datatable()
    {
        return \response()->json(CommunityProject::orderBy('id')->get() , 200);
        # code...
    }
}
