<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrainingForm;
use App\Http\Requests\UpdateTrainingForm;
use App\Models\TrainingForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use JavaScript;

class TrainingFormController extends Controller
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
        return \View::make('research.TrainingForm.training-form-list'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('research.TrainingForm.training-form-create'); 
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
        $trainingFormModel->approve_by = '0';
        $trainingFormModel->approval_status = Config::get('constants.status_pending');
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
      $getSingleData = TrainingForm::find($id);
        // return $getSingleData->id;

      return \View::make('research/TrainingForm/training-form-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingForm $request, $id)
    {
      $validatedData = $request->validated();

      $findData = TrainingForm::find($id);

      $findData->title = $validatedData['title'];
      $findData->type = $validatedData['type'];
      $findData->date = $validatedData['date'];
      $findData->speaker = $validatedData['speaker'];
      $findData->participant_numbers = $validatedData['number_participants'];
      $findData->total_amount_received = $validatedData['total_amount_received'];
      $findData->total_amount_spent = $validatedData['total_amount_spent'];
      $findData->status = '1';
      $findData->created_by = Auth::id();

      if ($findData->save()) {
          return response()->json(['status'=>'true' , 'message' => 'Training data updated successfully'] , 200);
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
        $deleteData = TrainingForm::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'training form data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }
    public function datatable()
    {
        return \response()->json(TrainingForm::orderBy('id')->get() , 200);
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

        $trainingFindModel = TrainingForm::find($validatedData['orderId']);

        $trainingFindModel->approve_by = Auth::id();
        $trainingFindModel->approval_status = $validatedData['orderStatus'];

        if ($trainingFindModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Training form status update successfully'] , 200);
        }else{
             return response()->json(['status'=>'errorr' , 'message' => 'error occured please try again'] , 200);
        }
    }
}
