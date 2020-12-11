<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFunder;
use App\Models\Funder;
use Illuminate\Support\Facades\Auth;
class FunderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('research/Funders/funder-create');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $funderModel->funding_organization_name = $validatedData['funding_organization_name'];
        $funderModel->website = $validatedData['website'];
        $funderModel->email = $validatedData['email'];
        $funderModel->phoneNo = $validatedData['phoneNo'];
        $funderModel->team_lead = $validatedData['team_lead'];
        $funderModel->funder_status = $validatedData['status'];
        $funderModel->response = $validatedData['response'];
        $funderModel->status = '1';
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
}
