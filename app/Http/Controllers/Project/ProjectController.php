<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\FundingAgency;

use Exceptions;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $project=Project::all();
            return view('project.create',compact('project'));
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        abort_unless(auth()->user()->can('create_project'),403,'you dont have required authorization to this resource');

        try {
//            $this->validate($request,[
//                 'project_no'=>'required',
//                 'project_title'=>'required',
//                 'project_scheme'=>'required',
//                 'project_duration'=>'required',
//                 'project_total_cost'=>'required',
//            ]);
//            $fields=$request->only(['project_no','project_title','project_scheme',
//                'project_duration','project_total_cost',]);

                $project=new Project;
            $project->project_no=$request->project_no;
            $project->project_title=$request->project_title;
            $project->project_scheme=$request->project_scheme;
            $project->project_duration=$request->project_duration;
            $project->project_total_cost=$request->project_total_cost;
        //    $project->funding_agency_id=$request['funding_agency_id'];

            $project->save();
            return redirect(route('project.index'))
                ->with('success','Project Create Successfully');


        }catch (Exception $e){

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
//     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {

        $project=Project::find($id);
        // $project= Project::with(['agency'=>function($q){
        //     $q->select('id','agency_name');
        // }])->find($id);
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        abort_unless(auth()->user()->can('edit_project'),403,'you dont have required authorization to this resource');

        try {
            $project=Project::find($id);
            $project->project_no=$request->project_no;
            $project->project_title=$request->project_title;
            $project->project_scheme=$request->project_scheme;
            $project->project_duration=$request->project_duration;
            $project->project_total_cost=$request->project_total_cost;
            $project->save();
            return redirect(route('project.index'))
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        abort_unless(auth()->user()->can('delete_project'),403,'you dont have required authorization to this resource');

        Project::destroy($id);
        return redirect(route('project.index'))
            ->with('success','Project Delete Successfully');

    }
}
