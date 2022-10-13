<?php

namespace App\Http\Controllers\InvoiceUpload;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
use App\Models\InvoiceUpload;
use Exception;
use File;
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
        $data=new InvoiceUpload();
        $file=$request->file;
        $filename='' .$file->getClientOriginalName();
        $request->file->move('assets',$filename);
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
    public function download($id)
    {
    //    return DB::table('invoice_uploads')->where('id',$id)->first();

        // $filepath=public_path("public/assets/{$data->upload}");
        // return Response::download($filepath);
//        return \response()->download($filepath);
        // dd($request);
        return response()->download(public_path("assets/".$id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $data= InvoiceUpload::find($id);

        return view('upload.show',compact('data'));
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
            // InvoiceUpload::destroy($id);
            // return redirect(route('invoiceuoload.index'))->with('success',' delete Successfully');
        // }catch (Exception $e)
        // {
        //     return ["message" => $e->getMessage(),
        //         "status" => $e->getCode()
        //     ];
        // }

        // $news = InvoiceUpload::find($id);
        // $image_path = app_path("public/assets");

        // // if (File::exists($image_path)) {
        //     //File::delete($image_path);
        //     unlink($image_path);
        // // }
        // $news->delete();
        if (file_exists($id)) {
            return unlink($id);
        } else {
            echo('File not found.');
        }
    }
}
