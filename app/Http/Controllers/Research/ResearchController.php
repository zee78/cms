<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResearchTask;
use App\Models\Research;
use Illuminate\Support\Facades\Auth;
class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }
    public function datatable()
    {
        return \response()->json(Research::orderBy('id')->get() , 200);
        # code...
    }
}
