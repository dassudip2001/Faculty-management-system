<?php

namespace App\Http\Controllers\BudgetHead;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\BudgetHead;
use Exception;

class BudgetHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $budget=BudgetHead::all();
            return view('budget.create',compact('budget'));
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
        abort_unless(auth()->user()->can('create_budget'),403,'you dont have required authorization to this resource');

        try {
            $budget=new BudgetHead;
            $budget->budget_title=$request->budget_title;
            $budget->budget_type=$request->budget_type;
            $budget->save();
            return redirect(route('budget.index'))->with('success','Budget Created Successfully');
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
    public function edit($id)
    {
        abort_unless(auth()->user()->can('edit_budget'),403,'you dont have required authorization to this resource');
        try {

            $budget=BudgetHead::find($id);
            return view('budget.edit',compact('budget'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        abort_unless(auth()->user()->can('edit_budget'),403,'you dont have required authorization to this resource');

        try {
            $budget=BudgetHead::find($id);
            $budget->budget_title=$request->budget_title;
            $budget->budget_type=$request->budget_type;
            $budget->save();
            return redirect(route('budget.index'))->with('success','Budget Update Successfully');

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
        abort_unless(auth()->user()->can('delete_budget'),403,'you dont have required authorization to this resource');
        try {
            BudgetHead::destroy($id);
            return redirect(route('budget.index'))->with('success','Budget delete Successfully');
        }catch (Exception $e)
        {
            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }

    }
}
