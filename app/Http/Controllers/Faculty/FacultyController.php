<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
use Exception;
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $faculty=Faculty::all();
            return view('faculty.create',compact('faculty'));
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
       abort_unless(auth()->user()->can('create_faculty'),403,'you dont have required authorization to this resource');

       try {
           $faculty=new Faculty;
//          $faculty->fac_name=$request->fac_name;
           $faculty->fac_code=$request->fac_code;
           $faculty->fac_title=$request->fac_title;
           $faculty->fac_designtion=$request->fac_designtion;
           $faculty->fac_join=$request->fac_join;
           $faculty->fac_retirement=$request->fac_retirement;
           $faculty->fac_phone=$request->fac_phone;
           $faculty->fac_status=$request->fac_status;
           $faculty->fac_description=$request->fac_description;
           $faculty->save();
           return redirect(route('faculty.index'))->with("success","Faculty Created successfully");

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $faculty=Faculty::find($id);
        return view('faculty.editform',compact('faculty'));

        }catch (Exception $e)
        {
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
         abort_unless(auth()->user()->can('edit_faculty'),403,'you dont have required authorization to this resource');
        try {
              $faculty= Faculty::find($id);
//        $faculty->fac_name=$request->fac_name;
        $faculty->fac_code=$request->fac_code;
        $faculty->fac_title=$request->fac_title;
        $faculty->fac_designtion=$request->fac_designtion;
        $faculty->fac_join=$request->fac_join;
        $faculty->fac_retirement=$request->fac_retirement;
        $faculty->fac_phone=$request->fac_phone;
        $faculty->fac_status=$request->fac_status;
        $faculty->fac_description=$request->fac_description;
        $faculty->save();
        return redirect(route('faculty.index'))->with('success','Faculty Update Successfully');

        }catch (Exception $e)
        {
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
        abort_unless(auth()->user()->can('delete_faculty'),403,'you dont have required authorization to this resource');
        try {
            Faculty::destroy($id);
            return redirect(route('faculty.index'))->with('success','Faculty Update successfully');
        } catch (Exception $e)
        {
            return ["message" => $e->getMessage(),
        "status" => $e->getCode()
         ];
        }


    }
}
