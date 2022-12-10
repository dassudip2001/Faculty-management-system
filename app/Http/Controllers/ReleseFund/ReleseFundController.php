<?php

namespace App\Http\Controllers\ReleseFund;

use App\Http\Controllers\Controller;
use App\Models\FundReleseBudgetModule;
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


        $funRelese= DB::table('relese_funds')
        // ->join('fund_relese_budget_modules','relese_fund_id','=','relese_funds.id')
        ->get();
        $projectDetail= DB::table('projects')
            // ->join('project_details','project_id',"=",'projects.id')
            // ->join('budget_heads','budget_heads.id',"=",'project_details.budget_id')
            // ->join('funding_agencies','funding_agencies.id',"=",'projects.funding_agency_id')
            ->get();

            $relesFubdAmount= DB::table('relese_funds')
            ->join('projects','projects.id','=','relese_funds.projec_fund_relese_id')
            ->join('fund_relese_budget_modules','fund_relese_budget_modules.relese_fund_id','=','relese_funds.id')
            // ->join('budget_heads','budget_heads.id','=','relese_funds.relese_fund_budget_id')
            ->join('budget_heads','budget_heads.id','=','fund_relese_budget_modules.relese_fund_budget_id')
            // ->join('')
            ->get();

            $fund= DB::table('projects')
            ->join('relese_funds','relese_funds.projec_fund_relese_id',"=",'projects.id')
            // ->join('relese_funds','relese_funds.id','=','fund_relese_budget_modules.relese_fund_id')
            ->get();
            // show details in views
            // return DB::table('relese_funds')
            // ->join('project_details','project_details.project_id',"=",'relese_funds.projec_fund_relese_id')->get();
            // return DB::table('relese_funds')->get();
            // = ReleseFund::all();

            // budgets
            $budget=DB::table('budget_heads')->get();
        return view('relese-fund.create',compact('fund','projectDetail','budget','relesFubdAmount','funRelese'));
    }

    // Search The Budget

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        // dd($request->all());
        // abort_unless(auth()->user()->can('create_relese_fund'),403,'you dont have required authorization to this resource');

        $request->validate([
            'date'=>'required',
            'transaction_no'=>'required|unique:relese_funds',
            'payment_method'=>'required',
            'transtation_date'=>'required',
            'relese_funds_amount'=>'required',
            'payment_method_no'=>'required|unique:relese_funds',
            'projec_fund_relese_id'=>'required',
        ]);

        $fields=$request->only([
            'date','transaction_no','payment_method','transtation_date',
            'relese_funds_amount','payment_method_no','projec_fund_relese_id',
            'projec_fund_relese_id','relese_fund_id','relese_fund_budget_id',
            'fund_relese_budget_amount'
        ]);
          $fund=new ReleseFund([
            'date'=>$fields['date'],
            'transaction_no'=>$fields['transaction_no'],
            'payment_method'=>$fields['payment_method'],
            'transtation_date'=>$fields['transtation_date'],
            'payment_method_no'=>$fields['payment_method_no'],
            'relese_funds_amount'=>$fields['relese_funds_amount'],
            // project Id
            // 'projec_fund_relese_id'=>$fields['projec_fund_relese_id'],
          ]);
          $fund->projec_fund_relese_id=$fields['projec_fund_relese_id'];
          $fund->save();
            //    $fund=new ReleseFund;
            //    $fund->date=$request->date;
            //    $fund->transaction_no=$request->transaction_no;
            //    $fund->payment_method=$request->payment_method;
            //    $fund->transtation_date=$request->transtation_date;
            //    $fund->payment_method_no=$request->payment_method_no;
            //    $fund->relese_funds_amount=$request->relese_funds_amount;
            //    $fund->projec_fund_relese_id=$request['projec_fund_relese_id'];
            //    $fund->save();

            //    budget Calculation
            foreach($request->relese_fund_budget_id as $key=>$insert){
                $saveRecord=[
                    'relese_fund_id'=>$fund->id,
                    'relese_fund_budget_id'=>$request->relese_fund_budget_id[$key],
                    'fund_relese_budget_amount'=>$request->fund_relese_budget_amount[$key],
                ];
                DB::table('fund_relese_budget_modules')->insert($saveRecord);
            }
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {



        $budget_heads =  DB::table('budget_heads')->get();
        $projectDetail=DB::table('projects')->get();

        $amount=DB::table('fund_relese_budget_modules')
        ->join('budget_heads','budget_heads.id','=','fund_relese_budget_modules.relese_fund_budget_id')
        ->where('relese_fund_id',$id)->get();

        $fund_relese_budget_modules = DB::table('fund_relese_budget_modules')->get();
        $relese_funds = DB::table('relese_funds')
            ->where('id',$id)
            ->get()->first();
        return View('relese-fund.edit')->with([
            'relese_funds'=>$relese_funds,
            'fund_relese_budget_modules'=>$fund_relese_budget_modules,
            'budget_heads'=>$budget_heads,
            'projectDetail'=>$projectDetail,
            'amount'=>$amount,
        ]);
//        return DB::table('relese_funds')->get();
//        // abort_unless(auth()->user()->can('update_relese_fund'),403,'you dont have required authorization to this resource');
//
//            $releseFund= ReleseFund::find($id);

//        return view('relese-fund.edit',compact('releseFund'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // abort_unless(auth()->user()->can('update_relese_fund'),403,'you dont have required authorization to this resource');

        // try {
            $request->validate([
                'date'=>'required',
                'transaction_no'=>'required|unique:relese_funds',
                'payment_method'=>'required',
                'transtation_date'=>'required',
                'relese_funds_amount'=>'required',
                'payment_method_no'=>'required|unique:relese_funds',
                
                'projec_fund_relese_id'=>'required',
            ]);

            $fields=$request->only([
                'date','transaction_no','payment_method','transtation_date',
                'relese_funds_amount','payment_method_no','projec_fund_relese_id',
                'relese_fund_id','relese_fund_budget_id',
                'fund_relese_budget_amount'
            ]);

            $fund=ReleseFund::find($id);
            $fund->date=$fields['date'];
            $fund->transaction_no=$fields['transaction_no'];
            $fund->payment_method=$fields['payment_method'];
            $fund->transtation_date=$fields['transtation_date'];
            $fund->payment_method_no=$fields['payment_method_no'];
            $fund->relese_funds_amount=$fields['relese_funds_amount'];


            $fund->projec_fund_relese_id=$fields['projec_fund_relese_id'];
            $fund->save();

            //    budget Calculation

            foreach($request->relese_fund_budget_id as $key=>$insert){
                $data=array(
                    'relese_fund_id'=>$fund->id,
                    'relese_fund_budget_id'=>$request->relese_fund_budget_id[$key],
                    'fund_relese_budget_amount'=>$request->fund_relese_budget_amount[$key],
                );
                FundReleseBudgetModule::where(['relese_fund_id'=>$fund->id,'relese_fund_budget_id'=>$request->relese_fund_budget_id[$key]])->update($data);
                // $saveRecord=[
                //     'relese_fund_id'=>$fund->id,
                //     'relese_fund_budget_id'=>$request->relese_fund_budget_id[$key],
                //     'fund_relese_budget_amount'=>$request->fund_relese_budget_amount[$key],
                // ];
                // DB::table('fund_relese_budget_modules')->insert($saveRecord);
            }

            return redirect(route('relesefund.index'))
            ->with('success','Update Successfully');
        // } 
        // catch (Exception $e){

        //     return ["message" => $e->getMessage(),
        //         "status" => $e->getCode()
        //     ];
        // }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // abort_unless(auth()->user()->can('delete_relese_fund'),403,'you dont have required authorization to this resource');

        try {

//             $fc=CreateUser::find($id)->faculty_id;
//             $uc=CreateUser::find($id)->user_id;
// //            create user delete
//             CreateUser::find($id)->delete();
// //            faculty Delete
//             Faculty::find($fc)->delete();
// //            user delete
//             User::find($uc)->delete();

        $data =DB::table('relese_funds')
                    ->leftJoin('fund_relese_budget_modules','relese_funds.id', '=','fund_relese_budget_modules.relese_fund_id')
                    ->where('relese_funds.id', $id); 
        DB::table('fund_relese_budget_modules')->where('relese_fund_id', $id)->delete();                           
        $data->delete();



        // DB::table('relese_funds')
        // // ->join('fund_relese_budget_modules','fund_relese_budget_modules.relese_fund_id','=','relese_funds.id')
        // // ->whereIn('relese_fund_id',$id)
        // ->delete($id);
            return redirect(route('relesefund.index'))->with('success','Delete Successfully');
        } catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    // pdf generate all pdf
    public function pdf(){
        $releseFund2=DB::table('fund_relese_budget_modules')
        ->join('budget_heads','budget_heads.id','=','fund_relese_budget_modules.relese_fund_budget_id')
        ->join('relese_funds','relese_funds.id','=','fund_relese_budget_modules.relese_fund_id')
        ->join('projects','projects.id','=','relese_funds.projec_fund_relese_id')
        ->get();
        
        $pdf=PDF::loadView('relese-fund.print',compact('releseFund2'));
        return $pdf->download('fund.pdf');
    }
    // generate pdf one row
    public function pdfForm(Request $request,$id){
        $releseFund1= DB::table('fund_relese_budget_modules')
        ->join('budget_heads','budget_heads.id','=','fund_relese_budget_modules.relese_fund_budget_id')
        ->join('relese_funds','relese_funds.id','=','fund_relese_budget_modules.relese_fund_id')
        ->join('projects','projects.id','=','relese_funds.projec_fund_relese_id')
        ->get()
       ->where('relese_fund_id', $id);
        $pdf=PDF::loadView('relese-fund.pdf_download',compact('releseFund1'));
        return $pdf->download('funding.pdf');
    }

    // search

    public function search(Request $request){
        // Get the search value from the request
       $search = $request->input('search');

       // Search in the title and body columns from the posts table
       $fundSearch = ReleseFund::query()
           ->where('date', 'LIKE', "%{$search}%")
           ->orWhere('transaction_no', 'LIKE', "%{$search}%")
           ->get();


        // Return the search view with the resluts compacted
        return view('relese-fund.search', compact('fundSearch'));
    }


    // relese fund show pages
    public function showall(Request $request, $id){
        $printfund= DB::table('fund_relese_budget_modules')
        ->join('budget_heads','budget_heads.id','=','fund_relese_budget_modules.relese_fund_budget_id')
        ->join('relese_funds','relese_funds.id','=','fund_relese_budget_modules.relese_fund_id')
        ->join('projects','projects.id','=','relese_funds.projec_fund_relese_id')
        ->get()->where('relese_fund_id', $id);       
       return view('relese-fund.show',compact('printfund'));
    }
}
