<?php

namespace App\Http\Controllers\CRO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCroProject;
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
        return \View::make('Cro/project-lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('cro/project-create');
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
        $deleteData = CROProject::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'Cro Project data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }
    public function datatable()
    {
        return \response()->json(CROProject::with('funder')->orderBy('id')->get() , 200);
        # code...
    }
}
