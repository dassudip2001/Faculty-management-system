<?php

namespace App\Http\Controllers\FundingAgency;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\FundingAgency;
use Exception;

class FundingAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $agency=FundingAgency::all();
            return view('funding.create',compact('agency'));
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
        abort_unless(auth()->user()->can('create_funding'),403,'you dont have required authorization to this resource');


//        try {
            $request->validate([
           'agency_name'=>'required'
        ]);
            $agency=new FundingAgency;
            $agency->agency_name=$request->agency_name;
            $agency->save();
            return redirect(route('funding.index'))->with('success','Funding Agency Created Successfully');
//        }catch (Exception $e)
//        {
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
        try {
            $agency=FundingAgency::find($id);
            return view('funding.edit',compact('agency'));
        }  catch (Exception $e){

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
        abort_unless(auth()->user()->can('edit_funding'),403,'you dont have required authorization to this resource');

        try {
            $agency=FundingAgency::find($id);
        $agency->agency_name=$request->agency_name;
        $agency->save();
        return redirect(route('funding.index'))->with('success','Funding Agency Update Successfully');

        } catch (Exception $e)
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
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        abort_unless(auth()->user()->can('delete_funding'),403,'you dont have required authorization to this resource');
        try {
            FundingAgency::destroy($id);
            return redirect(route('funding.index'))->with('success','Funding Agency Deleted Successfully');

        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
}
