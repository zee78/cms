<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrainingForm;
use App\Models\TrainingForm;
use Illuminate\Support\Facades\Auth;
class TrainingFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return \View::make('research/training-form');
        return \View::make('research.TrainingForm.training-form-create');

        
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
    public function store(StoreTrainingForm $request)
    {
        $validatedData = $request->validated();

        $trainingFormModel = new TrainingForm();

        $trainingFormModel->title = $validatedData['title'];
        $trainingFormModel->type = $validatedData['type'];
        $trainingFormModel->date = $validatedData['date'];
        $trainingFormModel->speaker = $validatedData['speaker'];
        $trainingFormModel->participant_numbers = $validatedData['number_participants'];
        $trainingFormModel->total_amount_received = $validatedData['total_amount_received'];
        $trainingFormModel->total_amount_spent = $validatedData['total_amount_spent'];
        $trainingFormModel->status = '1';
        $trainingFormModel->created_by = Auth::id();

        if ($trainingFormModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Training data add successfully'] , 200);
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
