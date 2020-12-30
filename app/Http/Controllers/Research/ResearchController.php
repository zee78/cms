<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResearchTask;
use App\Http\Requests\UpdateResearchTask;
use App\Models\Research;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use JavaScript;

class ResearchController extends Controller
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
        return \View::make('research.ResearchTask.research-task-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('research.ResearchTask.research-task-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResearchTask $request)
    {
        $validatedData = $request->validated();

        // return $validatedData;
        $researchModel = new Research();

        $researchModel->research_id = 'RSH-000001';
        $researchModel->title = $validatedData['title'];
        $researchModel->project_type = $validatedData['project_type'];
        $researchModel->funder_type = $validatedData['funder_type'];
        $researchModel->funder_name = $validatedData['funder_name'];
        $researchModel->amount = $validatedData['amount'];
        $researchModel->start_date = $validatedData['start_date'];
        $researchModel->end_date = $validatedData['end_date'];
        $researchModel->team_lead = $validatedData['team_lead'];
        $researchModel->team_members = $validatedData['team_members'];
        $researchModel->task_status = $validatedData['status'];
        $researchModel->approve_by = '0';
        $researchModel->approval_status = Config::get('constants.status_pending');
        $researchModel->status = '1';
        $researchModel->created_by = Auth::id();
        
        if ($researchModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Research data add successfully'] , 200);
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
        $getSingleData = Research::find($id);
        // return $getSingleData->id;

        return \View::make('research/ResearchTask/research-task-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResearchTask $request, $id)
    {
      $validatedData = $request->validated();

      // return $validatedData;
      $findData = Research::find($id);

      $findData->research_id = 'RSH-000001';
      $findData->title = $validatedData['title'];
      $findData->project_type = $validatedData['project_type'];
      $findData->funder_type = $validatedData['funder_type'];
      $findData->funder_name = $validatedData['funder_name'];
      $findData->amount = $validatedData['amount'];
      $findData->start_date = $validatedData['start_date'];
      $findData->end_date = $validatedData['end_date'];
      $findData->team_lead = $validatedData['team_lead'];
      $findData->team_members = $validatedData['team_members'];
      $findData->task_status = $validatedData['status'];
      $findData->status = '1';
      $findData->created_by = Auth::id();
      
      if ($findData->save()) {
          return response()->json(['status'=>'true' , 'message' => 'Research data updated successfully'] , 200);
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
        $deleteData = Research::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'research data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }
    public function datatable()
    {
        return \response()->json(Research::orderBy('id')->get() , 200);
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

        $researchFindModel = Research::find($validatedData['orderId']);

        $researchFindModel->approve_by = Auth::id();
        $researchFindModel->approval_status = $validatedData['orderStatus'];

        if ($researchFindModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Research task status update successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }


    }
}
