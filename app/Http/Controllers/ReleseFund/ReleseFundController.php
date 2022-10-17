<?php

namespace App\Http\Controllers\ReleseFund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReleseFund;
use Exception;

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
    // dd($request->all());

      
           
               $fund=new ReleseFund;
             
               $fund->date=$request->date;
               $fund->transaction_no=$request->transaction_no;
               $fund->payment_method=$request->payment_method;
           
                $fund->transtation_date=$request->transtation_date;
               $fund->payment_method_no=$request->payment_method_no;
            
       
               $fund->save();
               return redirect(route('relesefund.create'))->with('success','Created Successfully');
        
        // dd($request->all());
   
        

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
        // try {
            $fund=ReleseFund::find($id);
            $fund->date=$request->date;
            $fund->transaction_no=$request->transaction_no;
            $fund->payment_method=$request->payment_method;
            
            $fund->payment_method_no=$request->payment_method_no;
            $fund->transtation_date=$request->transtation_date;
            

            $fund->save();
            return redirect(route('relesefund.index'))
            ->with('success','Update Successfully');
 
        // } catch (Exception $e){

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
        try {
            ReleseFund::destroy($id);
            return redirect(route('relesefund.index'))->with('success','Delete Successfully');
        } catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
}
