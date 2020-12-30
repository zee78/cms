<?php

namespace App\Http\Controllers\SKincare\TrendAnalysis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrendAnalysis;
use App\Http\Requests\UpdateTrendAnalysis;
use App\Models\TrendAnalysis;
use Illuminate\Support\Facades\Auth;
use JavaScript;
class TrendAnalysisController extends Controller
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
        return \View::make('mady-skincare.TrendAnalysis.trend-analysis-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('mady-skincare.TrendAnalysis.trend-analysis-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrendAnalysis $request)
    {
        $validatedData = $request->validated();

        $trendAnalysisModel = new TrendAnalysis();

        $trendAnalysisModel->product_name = $validatedData['product_name'];
        $trendAnalysisModel->packs_sold = $validatedData['packs_sold'];
        $trendAnalysisModel->amount_received = $validatedData['amount_received'];
        $trendAnalysisModel->customer_feedback = $validatedData['customer_feedback'];

        $trendAnalysisModel->status = '1';
        $trendAnalysisModel->created_by = Auth::id();


         if ($trendAnalysisModel->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Trend Analysis data add successfully'] , 200);
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
        $getSingleData = TrendAnalysis::find($id);
        // return $getSingleData->id;

      return \View::make('mady-skincare/TrendAnalysis/trend-analysis-update' , compact('getSingleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrendAnalysis $request, $id)
    {
        $validatedData = $request->validated();

        $findData = TrendAnalysis::find($id);

        $findData->product_name = $validatedData['product_name'];
        $findData->packs_sold = $validatedData['packs_sold'];
        $findData->amount_received = $validatedData['amount_received'];
        $findData->customer_feedback = $validatedData['customer_feedback'];

        $findData->status = '1';
        $findData->created_by = Auth::id();


         if ($findData->save()) {
            return response()->json(['status'=>'true' , 'message' => 'Trend Analysis updated add successfully'] , 200);
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
        $deleteData = TrendAnalysis::find($id);
        if($deleteData->delete()){
            return response()->json(['status'=>'true' , 'message' => 'costing data deleted successfully'] , 200);

        }else{
            return response()->json(['status'=>'error' , 'message' => 'error occured please try again'] , 200);

        }
    }

    // ******************* get all data ***************

    public function datatable()
    {
        return \response()->json(TrendAnalysis::orderBy('id')->get() , 200);

    }
}
