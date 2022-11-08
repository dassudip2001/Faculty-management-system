<?php

namespace App\Http\Controllers\ProjectBudgetAmount;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectDetails;
use App\Models\ProjectBudgetAmount;
use Exception;

use Illuminate\Support\Facades\DB;

class ProjectBudgetAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projectID = $
        $amountCal =  DB::table('project_details')
            ->join('projects','projects.id',"=",'project_details.project_id')
            ->join('budget_heads','budget_heads.id',"=",'project_details.budget_id')

            ->get();
        $showAmountCal=ProjectBudgetAmount::all();
        return view('project-budget-amount.create',compact('amountCal',$showAmountCal));
        //return compact('amountCal',$showAmountCal);
    }
    // public function find($p_id){
    //     // dd($p_id);
    //     // echo "$p_id";
    //     $combo=explode(";",$p_id);
    //     // dd($combo[0]);
    //       $value= DB::table('projects')
    //       ->where('project_no','=','p1001')->find($p_id);
    //       dd($value);
    //     //   $department=Department::find($id);
    // }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        try{
            

            foreach ($request->project_details_id as $key=>$insert){
            $saveRecord=[
                'project_details_id'=>require['project_details_id'],
                'year'=>$request->year[$key],
                'project_budge_amount'=>$request->project_budge_amount[$key],
            ];
            DB::table('project_budget_amounts')->insert($saveRecord);
        }
            // $projectBudgetAmount->save();
            return redirect(route('project-budget-amount.create'))
            ->with('success','  Successfully Created');
        }
        catch (Exception $e)
        {
            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
        // foreach ($request->project_details_id as $key=>$insert){
        //     $saveRecord=[
        //         'project_details_id'=>$request->project_details_id[$key],
        //         'year'=>$request->year[$key],
        //         'project_budge_amount'=>$request->project_budge_amount[$key],
        //     ];
        //     DB::table('project_budget_amounts')->insert($saveRecord);
        // }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
