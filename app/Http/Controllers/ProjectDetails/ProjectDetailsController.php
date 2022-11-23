<?php

namespace App\Http\Controllers\ProjectDetails;

use App\Http\Controllers\Controller;
use App\Models\BudgetHead;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectDetails;
use App\Models\FundingAgency;
use App\Models\CreateUser;
use App\Models\BudgetDetails;
use Illuminate\Support\Facades\DB;
use Exception;
use PDF;
class ProjectDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        

        // return DB::table('faculties')
        // ->join('create_users','create_users.id','=','faculties.id')
        // ->get();
        $data2= DB::table('create_users')
        ->join('faculties','faculties.id','=','create_users.id')
        ->join('departments','departments.id','=','create_users.department_id')
        ->join('users','users.id','=','create_users.user_id')
        ->get();

    //    only iquique details
        $project_details= DB::table('projects')
            // ->join('project_details','project_id',"=",'projects.id')
            ->get();
        // $projectDetail=
        $projectDetail= DB::table('projects')
            ->join('project_details','project_id',"=",'projects.id')
            ->join('budget_heads','budget_heads.id',"=",'project_details.budget_id')
            ->join('funding_agencies','funding_agencies.id',"=",'projects.funding_agency_id')

            ->get();
//        $projectDetail=  DB::table('project_details')
//        // ->join('funding_agencies','funding_agencies.id',"=",'project_details.funding_agency_id')
//        ->join('budget_heads','budget_heads.id',"=",'project_details.budget_id')
//        ->join('projects','projects.id',"=",'project_details.project_id')
//        // ->join('funding_agencies','funding_agencies.id',"=",'project_details.project_id')
//        // ->join('faculties','faculties.id',"=",'create_users.faculty_id')
//        //     ->join('users','users.id',"=",'create_users.user_id')
//        //     ->join('departments','departments.id','=','create_users.department_id')
//        // ->join('users','users.id',"=",'project_details.user_id')
//        // ->join('users','user.id',"=",'project_details.project_id')
//        // ->join (DB::table('create_users'))
//        // ->join('faculties','faculties.id',"=",'create_users.faculty_id')
//        // ->join('users','users.id',"=",'create_users.user_id')
//        // ->join('departments','departments.id','=','create_users.department_id')
//
//
//        // ->join('funding_agencies','funding_agencies.id',"=",'project_details.project_id')
//        ->get();
        // $projectDetail=ProjectDetails::all();


    //    $data2=DB::table('create_users')
    //         ->join('faculties','faculties.id',"=",'create_users.faculty_id')
    //         ->join('users','users.id',"=",'create_users.user_id')
    //         ->join('departments','departments.id','=','create_users.department_id')
    //         ->get();
            // echo "$data2";
        $budget=BudgetHead::all();
        $data=FundingAgency::all();
        $data3=Project::all();

        
//        $data4=BudgetDetails::all();
        return view('projectdetails.create',
            compact('data','data2','budget','data3','projectDetail','project_details'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request  )
    {
        // dd($request->all());
        // if(Auth::user()->id=='1' || auth()->user()->id==$id+1)
//       dd($request->all());
//         abort_unless(auth()->user()->can('create_project'),
//             403,'you dont have required authorization to this resource');

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
              'funding_agency_id', 'create_user_id','budget_id','budget_details_amount','project_id',
            ]);

            $project=new Project([
                'project_no'=>$fields['project_no'],
                 'project_title'=>$fields['project_title'],
                'project_scheme'=>$fields['project_scheme'],
                'project_duration'=>$fields['project_duration'],
                'project_total_cost'=>$fields['project_total_cost'],
                // Funding Agency Id References
                'funding_agency_id'=>$fields['funding_agency_id'],
            // Create User Id References
               'create_user_id'=>$fields['create_user_id'],

            ]);
            $project->funding_agency_id=$fields['funding_agency_id'];
            $project->create_user_id=$fields['create_user_id'];
            $project->save();
             //pivot table
//
//
        foreach($request->budget_id as $key=>$insert){
            $saveRecord=[
                'project_id'=>$project->id,
                'budget_id'=>$request->budget_id[$key],
                'budget_details_amount'=>$request->budget_details_amount[$key],
            ];
            DB::table('project_details')->insert($saveRecord);
        }
            // $pivot=new ProjectDetails();
            // $pivot->project_id=$project->id;
            // $pivot->budget_id = $fields('budget_id', []);
            // $pivot->budget_details_amount = $fields('budget_details_amount', []);
            // for ($product=0; $product < count($pivot->budget_id); $product++) {
            //     if ($pivot->budget_id[$product] != '') {
            //         $pivot->products()->attach($pivot->budget_id[$product], ['quantity' => $pivot->budget_details_amount[$product]]);
            //     }
            // }
            // $pivot->save();

//            $pivot=new ProjectDetails();

//            $pivot->project_id=$project->id;
//            $pivot->budget_id = $fields['budget_id'];
//            $pivot->budget_details_amount = $fields['budget_details_amount'];
            // for ($i=0; $i < count($pivot->budget_id); $i++) {
                // if ($pivot->budget_id[$i] != '') {
//                    $pivot->budget_id()->attach($pivot->budget_id[0], ['quantity' => $pivot->budget_details_amount[0]]);
                // }
                // $data=['budget_id'=> $budget_id[$i],'budget_details_amount' => $budget_details_amount[$i]];
                // dd($data);


            // }

//            $pivot->save();

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
    * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit( $id)
    {


        $budget_heads =  DB::table('budget_heads')->get(); 
        $funding=DB::table('funding_agencies')->get(); 
        $createUser=DB::table('create_users')
        ->join('faculties','faculties.id',"=",'create_users.faculty_id')
        ->join('users','users.id',"=",'create_users.user_id')
        ->join('departments','departments.id','=','create_users.department_id')
        ->get();     
        $project_details = DB::table('project_details')->get();
        $projects=DB::table('projects')
            ->where('id',$id)
            ->get()->first();
        return View('projectdetails.edit')->with([
            'projects'=>$projects,
            'funding'=>$funding,
            'project_details'=>$project_details,
            'budget_heads'=>$budget_heads,
            'createUser'=>$createUser,
            
        ]);


        // try{

        // return view('projectdetails.edit',compact('projectDetail'))
        // ->with('success','Project Update Successfully');
        // }catch (Exception $e){

        //     return ["message" => $e->getMessage(),
        //         "status" => $e->getCode()
        //     ];
        // }



//        return ProjectDetails::with(
//            [
//                'project'=>function($q){
//                $q->select(['project_no','project_title','project_scheme']);
//                }
//            ]
//        )->find($project_id);

        // if(Auth::user()->id=='1' || auth()->user()->id==$id+1)

//        return DB::table('project_details')
//        ->join('budget_heads','budget_heads.id',"=",'project_details.budget_id')
//        ->join('projects','projects.id',"=",'project_details.project_id')
//        ->join('funding_agencies','funding_agencies.id',"=",'project_details.project_id')
//        // ->join('create_users','create_users.user_id',"=",'projects.create_user_id')
//        // ->join('users','users.id',"=",'projects.create_user_id')
//        // ->join('')
//        ->get();


    //    return DB::table('projects')
    //         ->join('project_details','project_id',"=",'projects.id')
    //         ->join('budget_heads','budget_heads.id',"=",'project_details.budget_id')
    //         ->join('funding_agencies','funding_agencies.id',"=",'projects.funding_agency_id')
    // return DB::table('project_details')

            // ->get()->where('project_id', $project_id);

        // $projectDetail=Project::with([
        //      'fundingagency'=>function($q){
        //             $q->select(['id','agency_name']);
        //              },
        //         'createuser'=>function($q){
        //         $q->select(['id']);
        //          },
        // ]

        // )->find($id);

        // return DB::table('projects')->where('id',$id);


        // $projectDetail= DB::table('project_details')
        // // ->join('funding_agencies','funding_agencies.id',"=",'project_details.funding_agency_id')
        // ->join('budget_heads','budget_heads.id',"=",'project_details.budget_id')
        // ->join('projects','projects.id',"=",'project_details.project_id')
        // // ->join('funding_agencies','funding_agencies.id',"=",'project_details.project_id')
        // ->get();
        // // $projectDetail= DB::table('project_details')->get();
        // // $projectDetail= ProjectDetails::all();
        // // $->load('projectDetail');
        // $data2=DB::table('create_users')
        // ->join('faculties','faculties.id',"=",'create_users.faculty_id')
        // ->join('users','users.id',"=",'create_users.user_id')
        // ->join('departments','departments.id','=','create_users.department_id')
        // ->get();

        // return DB::table('project_details')
        // ->join('projects','projects.id',"=",'project_details.project_id')->get();
        // ->find('project_id');


//        abort_unless(auth()->user()->can('edit_project'), 403,'you dont have required authorization to this resource');

//         try {
// //            $projectDetail= ProjectDetails::with('project','fundingagency','createuser','budgethead')

// //            ->get();
//             // $projectDetail= ProjectDetails::with([
//             //     'project'=>function($q){
//             //     $q->select(['id','project_no','project_title','project_scheme',
//             //         'project_duration','project_total_cost']);
//             //     },
//             //     // 'fundingagency'=>function($q){

//             //     //     $q->select(['id','agency_name']);
//             //     // },
//             //     // 'createuser'=>function($q){
//             //     //     $q->select(['id']);
//             //     // },
//             //     'budgethead'=>function($q){
//             //         $q->select(['id','budget_title']);
//             //     }
//             // ])->get();
//             // return view('projectdetails.edit',compact('projectDetail'))
//             //     ->with('success','Project Update Successfully');
//         }catch (Exception $e){

//             return ["message" => $e->getMessage(),
//                 "status" => $e->getCode()
//             ];
//         }
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
        // abort_unless(auth()->user()->can('edit_project'),
        //     403,'you dont have required authorization to this resource');

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
             'funding_agency_id', 'create_user_id','budget_id','budget_details_amount','project_id',
           ]);

           $project=Project::find($id);
           $project->project_no=$fields['project_no'];
           $project->project_title=$fields['project_title'];
           $project->project_scheme=$fields['project_scheme'];
           $project->project_duration=$fields['project_duration'];
           $project->project_total_cost=$fields['project_total_cost'];

        //    $project=new Project([
        //        'project_no'=>$fields['project_no'],
        //         'project_title'=>$fields['project_title'],
        //        'project_scheme'=>$fields['project_scheme'],
        //        'project_duration'=>$fields['project_duration'],
        //        'project_total_cost'=>$fields['project_total_cost'],
        //        // Funding Agency Id References
        //        'funding_agency_id'=>$fields['funding_agency_id'],
        //    // Create User Id References
        //       'create_user_id'=>$fields['create_user_id'],

        //    ]);
           $project->funding_agency_id=$fields['funding_agency_id'];
           $project->create_user_id=$fields['create_user_id'];
           $project->save();
            //pivot table
//
//
       foreach($request->budget_id as $key=>$insert){
           $saveRecord=[
               'project_id'=>$project->id,
               'budget_id'=>$request->budget_id[$key],
               'budget_details_amount'=>$request->budget_details_amount[$key],
           ];
           DB::table('project_details')->update($saveRecord);
       }


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


//        public function destroy(Ticket $ticket)
////    {
//        $ticket =DB::table('projects')
//            -> leftJoin('projects','tickets.id', '=','gp_group.ticket_id')
//            -> where('tickets.id',$ticket)->first();
////    }
//        $ticket->delete();
//        Project::where("id", $ticket)->delete();
//        gp_group::where("gpid", $ticket->id)->delete();
//        $ticket->delete();
//        gp_group::where("gpid", $ticket->id)->delete();
    //    abort_unless(auth()->user()->can('delete_project'),
        //    403,'you dont have required authorization to this resource');

        try {
        //     $data =DB::table('projects')
        //             ->leftJoin('project_details','projects.id', '=','project_details.project_id')
        //             ->where('projects.id', $id); 
        // DB::table('project_details')->where('project_id', $id)->delete();                           
        // $data->delete();

        DB::table('projects')
          
          ->delete($id);


        //     $post = Project::find($id);
        //     ProjectDetails::where('project_id',$post)->delete();

        //     $data =DB::table('project_details')
        //             ->leftJoin('projects','projects.id', '=','project_details.project_id')
        //             ->where('projects.id', $id); 
        // DB::table('project_details')->where('project_id', $id)->delete();                           
        // $data->delete();

        //    DB::table('projects')
        //        ->join('project_details','project_id',"=",'projects.id')
        //        ->where($id)->delete();
//             $pc=ProjectDetails::find($id)->project_id;
//             ProjectDetails::find($id)->delete();
            // Project::find($id)->delete();
//            $pc=Project::find($id);
//            ProjectDetails::find($pc)->delete();

            // ProjectDetails::find($pc)->project_id->delete();
            //  ProjectDetails::find($pc)->delete();
        //    $fc=ProjectDetails::find($id)->project_id;
////            $uc=CreateUser::find($id)->user_id;
////            create user delete
        //    Project::find($fc)->delete();
////            faculty Delete
//            ProjectDetails::find($fc)->delete();
            return redirect(route('projectdetail.index'))
                ->with('success', 'Data Deleted Successfully');
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
        //
    }

      // pdf generate all pdf
      public function pdf(){
        $createUser=DB::table('create_users')
        ->join('faculties','faculties.id','=','create_users.id')
        ->join('departments','departments.id','=','create_users.department_id')
        ->join('users','users.id','=','create_users.user_id')
        ->join('projects','projects.create_user_id','=','create_users.user_id')
        ->join('project_details','project_details.project_id','=','projects.id')
        ->join('budget_heads','budget_heads.id','=','project_details.budget_id')
        ->join('funding_agencies','funding_agencies.id','=','projects.funding_agency_id')
        ->get();
        $pdf=PDF::loadView('projectdetails.print',compact('createUser'));
        return $pdf->download('project.pdf');
   }
    // generate pdf one row
    public function pdfForm(Request $request,$id){
    $createUser1 =DB::table('create_users')
    ->join('faculties','faculties.id','=','create_users.id')
    ->join('departments','departments.id','=','create_users.department_id')
    ->join('users','users.id','=','create_users.user_id')
    ->join('projects','projects.create_user_id','=','create_users.user_id')
    ->join('project_details','project_details.project_id','=','projects.id')
    ->join('budget_heads','budget_heads.id','=','project_details.budget_id')
    ->join('funding_agencies','funding_agencies.id','=','projects.funding_agency_id')
    ->get()->where('project_id',$id);
    $pdf=PDF::loadView('projectdetails.pdf_download',compact('createUser1'));
    return $pdf->download('project.pdf');
    }


    // search module
    public function search(Request $request){
        // Get the search value from the request
       $search = $request->input('search');

       // Search in the title and body columns from the posts table
       $ProjectPosts = Project::query()
           ->where('project_no', 'LIKE', "%{$search}%")
           ->orWhere('project_title', 'LIKE', "%{$search}%")
           ->get();


        // Return the search view with the resluts compacted
        return view('projectdetails.search', compact('ProjectPosts'));
    }



    // show all details for a project

    public function showall(Request $request, $id){
        $printPage= DB::table('create_users')
        ->join('faculties','faculties.id','=','create_users.id')
        ->join('departments','departments.id','=','create_users.department_id')
        ->join('users','users.id','=','create_users.user_id')
        ->join('projects','projects.create_user_id','=','create_users.user_id')
        ->join('project_details','project_details.project_id','=','projects.id')
        ->join('budget_heads','budget_heads.id','=','project_details.budget_id')
        ->join('funding_agencies','funding_agencies.id','=','projects.funding_agency_id')
        ->get()->where('project_id',$id);
       return view('projectdetails.show',compact('printPage'));
    }

   

}
