<?php

namespace App\Http\Controllers\InvoiceUpload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\InvoiceUpload;
use Exception;
class InvoiceUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice= InvoiceUpload::all();
        return view('upload.create',compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=new InvoiceUpload;
        $file=$request->file;
        $filename=' ' .$file->getClientOriginalName();
        $request->file->move('public/assets',$filename);
        $data->file=$filename;
        $data->name=$request->name;       
        $data->save();
        // return redirect()->back();
        return redirect(route('invoiceuoload.index'))->with('success','Upload Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request,$file)
    {
        return response()->download(public_path('public/assets'.$file));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        // return InvoiceUpload::find($id);
        return view('upload.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try {
            InvoiceUpload::destroy($id);
            return redirect(route('invoiceuoload.index'))->with('success',' delete Successfully');
        // }catch (Exception $e)
        // {
        //     return ["message" => $e->getMessage(),
        //         "status" => $e->getCode()
        //     ];
        // }
    }
}
