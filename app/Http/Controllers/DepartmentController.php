<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $department=Department::all();
            return view('department.create',compact('department'));
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
        abort_unless(auth()->user()->can('create_department'),403,'you dont have required authorization to this resource');
//        try {
        $request->validate([
            'dept_name'=>'required|unique:departments',
            'dept_code'=>'required|unique:departments',
//            'description'=>'required'

        ]);
            $department=new Department;
            $department->dept_name=$request->dept_name;
            $department->dept_code =$request->dept_code;

            $department->description=$request->description;
            $department->save();
            return redirect(route('index'))->with('success','Department Created Successfully',array('timeout' => 3000),'error');
//        }catch (Exception $e){
//
//            return ["message" => $e->getMessage(),
//                "status" => $e->getCode()
//            ];
//        }

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
    public function edit($id)
    {
        abort_unless(auth()->user()->can('edit_department'),403,'you dont have required authorization to this resource');

        try {
            $department=Department::find($id);
            return view('department.editform',compact('department'));
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
       abort_unless(auth()->user()->can('edit_department'),403,'you dont have required authorization to this resource');

       try {
           $department=Department::find($id);
           $department->dept_name=$request->dept_name;
           $department->dept_code =$request->dept_code;

           $department->description=$request->description;
           $department->save();
           return redirect(route('index'))->with('success','Department Update Successfully');
       }catch (Exception $e){

           return ["message" => $e->getMessage(),
               "status" => $e->getCode()
           ];
       }

        // $reqData = $request->only(['name', 'description', 'code']);

        // $department =  Department::find($id);
        // if ($department == null) {
        //     abort(501, "Opps! There no record associate with this id $id");
        // }
        // if (array_key_exists('name', $reqData))
        //     $department->name = $reqData['name'];
        // if (array_key_exists('description', $reqData))
        //     $department->description = $reqData['description'];
        // if (array_key_exists('code', $reqData))
        //     $department->code = $reqData['code'];
        // try {
        //     $department->save();
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
        // return redirect(route('index'))->with('success', 'updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        abort_unless(auth()->user()->can('delete_department'),403,'you dont have required authorization to this resource');

        try {
            Department::destroy($id);
            return redirect(route('index'))->with('success','Department Delete Successfully');
        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }

    }
}
