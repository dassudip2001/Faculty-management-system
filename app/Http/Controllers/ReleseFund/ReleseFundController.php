<?php

namespace App\Http\Controllers\ReleseFund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReleseFund;
use Exception;
use PDF;
class ReleseFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fund=ReleseFund::all();
        return view('relese-fund.create',compact('fund'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_unless(auth()->user()->can('create_relese_fund'),403,'you dont have required authorization to this resource');
            
               $fund=new ReleseFund;

               $fund->date=$request->date;
               $fund->transaction_no=$request->transaction_no;
               $fund->payment_method=$request->payment_method;

                $fund->transtation_date=$request->transtation_date;
               $fund->payment_method_no=$request->payment_method_no;


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
        try {
            $fund=ReleseFund::find($id);
            $fund->date=$request->date;
            $fund->transaction_no=$request->transaction_no;
            $fund->payment_method=$request->payment_method;

            $fund->transtation_date=$request->transtation_date;
            $fund->payment_method_no=$request->payment_method_no;


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
        $releseFund=ReleseFund::all();
        $pdf=PDF::loadView('relese-fund.print',compact('releseFund'));
        return $pdf->download('fund.pdf');
    }
    // generate pdf one row
    public function pdfForm(Request $request,$id){
        $releseFund1 = ReleseFund::all()->where('id', $id);
        $pdf=PDF::loadView('relese-fund.pdf_download',compact('releseFund1'));
        return $pdf->download('funding.pdf');
    }
}
