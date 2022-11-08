<?php

namespace App\Http\Controllers\BudgetHead;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\BudgetHead;
use App\Models\FundingAgency;
use Exception;
use PDF;

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

//        try {
            $request->validate([
                'budget_title'=>'required',
                'budget_type'=>'required',
//            'description'=>'required'

            ]);
            $budget=new BudgetHead;
            $budget->budget_title=$request->budget_title;
            $budget->budget_type=$request->budget_type;
            $budget->save();
            return redirect(route('budget.index'))->with('success','Budget Created Successfully');
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
    // pdf generate all pdf
    public function pdf(){
        $budgetHead=BudgetHead::all();
        $pdf=PDF::loadView('budget.print',compact('budgetHead'));
        return $pdf->download('funding.pdf');
   }
      // generate pdf one row
      public function pdfForm(Request $request,$id){
        $budgetHead1 = BudgetHead::all()->where('id', $id);  
    $pdf=PDF::loadView('budget.pdf_download',compact('budgetHead1'));
    return $pdf->download('funding.pdf');
    }

 
    // search

    public function search(Request $request){
        // Get the search value from the request
       $search = $request->input('search');

       // Search in the title and body columns from the posts table
       $budgetSearch = BudgetHead::query()
           ->where('budget_title', 'LIKE', "%{$search}%")
           ->orWhere('budget_type', 'LIKE', "%{$search}%")
           ->get();
        

        // Return the search view with the resluts compacted
        return view('budget.search', compact('budgetSearch'));
    }

}
