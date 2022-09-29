<?php

namespace App\Http\Controllers\ProjectDetails;

use App\Http\Controllers\Controller;
use App\Models\BudgetHead;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectDetails;
use App\Models\FundingAgency;
use App\Models\CreateUser;
use App\Models\BudgetDetails;
use Illuminate\Support\Facades\DB;
use Exception;
class ProjectDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $projectDetail=ProjectDetails::all();
       $data2=DB::table('create_users')
            ->join('faculties','faculties.id',"=",'create_users.faculty_id')
            ->join('users','users.id',"=",'create_users.user_id')
            ->join('departments','departments.id','=','create_users.department_id')
            ->get();
        $budget=BudgetHead::all();
        $data=FundingAgency::all();
        $data3=Project::all();
//        $data4=BudgetDetails::all();
        return view('projectdetails.create',
            compact('data','data2','budget','data3','projectDetail'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
         abort_unless(auth()->user()->can('create_project'),
             403,'you dont have required authorization to this resource');

        try {
            $this->validate($request,[
                 'project_no'=>'required',
                 'project_title'=>'required',
                 'project_scheme'=>'required',
                 'project_duration'=>'required',
                 'project_total_cost'=>'required',
                 'budget_details_amount'=>'required',
            ]);
            $fields=$request->only(['project_no','project_title','project_scheme',
                'project_duration','project_total_cost',
              'funding_agency_id', 'create_user_id','budget_id','budget_details_amount',
            ]);
            $project=new Project([
                'project_no'=>$fields['project_no'],
                 'project_title'=>$fields['project_title'],
                'project_scheme'=>$fields['project_scheme'],
                'project_duration'=>$fields['project_duration'],
                'project_total_cost'=>$fields['project_total_cost'],
            ]);
            $project->save();
            $pivot=new ProjectDetails();
            // project Save
            $pivot->project_id=$project->id;
            // Funding Agency Id References
            $pivot->funding_agency_id=$fields['funding_agency_id'];
            // Create User Id References
            $pivot->create_user_id=$fields['create_user_id'];
            // Budget  id field
            // $pivot->budget_id=implode(',',['budget_id']);
            $pivot->budget_id=implode($fields['budget_id']);
//             $pivot['budget_id']=implode(',',$pivot->budget_id);
            // budget Amount Details
            $pivot->budget_details_amount=$fields['budget_details_amount'];
            $pivot['budget_details_amount']=implode(',',$pivot->budget_details_amount);
            $pivot->save();
            return redirect(route('projectdetail.index'))
                ->with('success','Project Created Successfully');
        }catch (Exception $e)
        {
            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }


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
//     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {

//        abort_unless(auth()->user()->can('edit_project'), 403,'you dont have required authorization to this resource');

        try {
//            $projectDetail= ProjectDetails::with('project','fundingagency','createuser','budgethead')

//            ->get();
            $projectDetail= ProjectDetails::with([
                'project'=>function($q){
                $q->select(['id','project_no','project_title','project_scheme',
                    'project_duration','project_total_cost']);
                },
                'fundingagency'=>function($q){

                    $q->select(['id','agency_name']);
                },
                'createuser'=>function($q){
                    $q->select(['id']);
                },
                'budgethead'=>function($q){
                    $q->select(['id','budget_title']);
                }
            ])->find($id);
            return view('projectdetails.edit',compact('projectDetail'))
                ->with('success','Project Update Successfully');
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        abort_unless(auth()->user()->can('edit_project'),
            403,'you dont have required authorization to this resource');

        try {
            $this->validate($request,[
                'project_no',
                'project_title',
                'project_scheme',
                'project_duration',
                'project_total_cost',
            ]);
            $fields=$request->only([
                'project_no',
                'project_title',
                'project_scheme',
                'project_duration',
                'project_total_cost',
            ]);
            $pc=ProjectDetails::find($id)->project_id;
            $fc=Project::find($pc);
            $fc->project_no=$fields['project_no'];
            $fc->project_title=$fields['project_title'];
            $fc->project_scheme=$fields['project_scheme'];
            $fc->project_duration=$fields['project_duration'];
            $fc->project_total_cost=$fields['project_total_cost'];
            $fc->save();
            ProjectDetails::find($id)->save();
            return redirect(route('projectdetail.index'))
                ->with('success','Project Update Successfully');
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        abort_unless(auth()->user()->can('delete_project'),
            403,'you dont have required authorization to this resource');

        try {
            $pc=ProjectDetails::find($id)->project_id;
            ProjectDetails::find($id)->delete();
            Project::find($pc)->delete();
            return redirect(route('projectdetail.index'))
                ->with('success', 'Data Deleted Successfully');
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
        //
    }
}
