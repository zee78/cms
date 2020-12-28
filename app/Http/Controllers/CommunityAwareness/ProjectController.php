<?php

namespace App\Http\Controllers\CommunityAwareness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommunityProject;
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
        $deleteData = CommunityProject::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'Community Project data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }
    public function datatable()
    {
        return \response()->json(CommunityProject::orderBy('id')->get() , 200);
        # code...
    }
}
