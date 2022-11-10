<?php

namespace App\Http\Controllers\ReleseFund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReleseFund;
use Exception;
use Illuminate\Support\Facades\DB;
use PDF;
class ReleseFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $projectDetail= DB::table('projects')
            // ->join('project_details','project_id',"=",'projects.id')
            // ->join('budget_heads','budget_heads.id',"=",'project_details.budget_id')
            // ->join('funding_agencies','funding_agencies.id',"=",'projects.funding_agency_id')
            ->get();

            $fund= DB::table('projects')
            ->join('relese_funds','relese_funds.projec_fund_relese_id',"=",'projects.id')
            ->get();
            // show details in views
            // return DB::table('relese_funds')
            // ->join('project_details','project_details.project_id',"=",'relese_funds.projec_fund_relese_id')->get();
            // return DB::table('relese_funds')->get();
            // = ReleseFund::all();
        return view('relese-fund.create',compact('fund','projectDetail'));
    }

    // Search The Budget

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        abort_unless(auth()->user()->can('create_relese_fund'),403,'you dont have required authorization to this resource');

        $request->validate([
            'date'=>'required',
            'transaction_no'=>'required',
            'payment_method'=>'required',
            'transtation_date'=>'required',
            'relese_funds_amount'=>'required',
            'payment_method_no'=>'required',
            'projec_fund_relese_id'=>'required',
        ]);
               $fund=new ReleseFund;
               $fund->date=$request->date;
               $fund->transaction_no=$request->transaction_no;
               $fund->payment_method=$request->payment_method;
               $fund->transtation_date=$request->transtation_date;
               $fund->payment_method_no=$request->payment_method_no;
               $fund->relese_funds_amount=$request->relese_funds_amount;
               $fund->projec_fund_relese_id=$request['projec_fund_relese_id'];
               $fund->save();
               return redirect(route('relesefund.create'))->with('success','Created Successfully');
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
        abort_unless(auth()->user()->can('update_relese_fund'),403,'you dont have required authorization to this resource');

            $releseFund= ReleseFund::find($id);

        return view('relese-fund.edit',compact('releseFund'));
        // try {
        //     $releseFund=ReleseFund::find($id);
        //     return view('relese-fund.edit',compact('releseFund'));
        // } catch (Exception $e){

        //     return ["message" => $e->getMessage(),
        //         "status" => $e->getCode()
        //     ];
        // }
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
        abort_unless(auth()->user()->can('update_relese_fund'),403,'you dont have required authorization to this resource');

        try {
            $fund=ReleseFund::find($id);
            $fund->date=$request->date;
            $fund->transaction_no=$request->transaction_no;
            $fund->payment_method=$request->payment_method;

            $fund->transtation_date=$request->transtation_date;
            $fund->payment_method_no=$request->payment_method_no;
            $fund->relese_funds_amount=$request->relese_funds_amount;


            $fund->save();
            return redirect(route('relesefund.index'))
            ->with('success','Update Successfully');
        } catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
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
        abort_unless(auth()->user()->can('delete_relese_fund'),403,'you dont have required authorization to this resource');

        try {
            ReleseFund::destroy($id);
            return redirect(route('relesefund.index'))->with('success','Delete Successfully');
        } catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    // pdf generate all pdf
    public function pdf(){
        $releseFund2=DB::table('projects')
        ->join('relese_funds','relese_funds.projec_fund_relese_id',"=",'projects.id')
        ->get();
        $pdf=PDF::loadView('relese-fund.print',compact('releseFund2'));
        return $pdf->download('fund.pdf');
    }
    // generate pdf one row
    public function pdfForm(Request $request,$id){
        $releseFund1 =DB::table('projects')
        ->join('relese_funds','relese_funds.projec_fund_relese_id',"=",'projects.id')
        ->get()->where('id', $id);
        $pdf=PDF::loadView('relese-fund.pdf_download',compact('releseFund1'));
        return $pdf->download('funding.pdf');
    }

    // search

    public function search(Request $request){
        // Get the search value from the request
       $search = $request->input('search');

       // Search in the title and body columns from the posts table
       $posts = ReleseFund::query()
           ->where('transaction_no', 'LIKE', "%{$search}%")
//            ->orWhere('dept_code', 'LIKE', "%{$search}%")
           ->get();


        // Return the search view with the resluts compacted
        return view('relese-fund.search', compact('posts'));
    }
}
