<?php

namespace App\Http\Controllers\InvoiceUpload;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\InvoiceUpload;
use Exception;
//use Illuminate\Support\Facades\File;
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
        // abort_unless(auth()->user()->can('create_invoice'),403,'you dont have required authorization to this resource');

        $request->validate([
            'name'=>'required',
            'file'=>'required',
            'description'=>'required',
            'bill_no'=>'required|unique:invoice_uploads',
            'amount'=>'required',
        ]);
        $data=new InvoiceUpload();
        $file=$request->file;
        $filename='' .$file->getClientOriginalName();
        $request->file->move('assets',$filename);
        $data->file=$filename;
        $data->name=$request->name;
        $data->description=$request->description;
        $data->bill_no=$request->bill_no;
        $data->amount=$request->amount;

        $data->save();
        // return redirect()->back();
        return redirect(route('invoiceuoload.index'))->with('success','Upload Successfully');
        // $image = $request->file('file');

        // $imageName = time(). ".". $image->extension();

        // $image->move(public_path('uploads'), $imageName);

        // $imageStatus = InvoiceUpload::create([
        //     "image_name" => $imageName
        // ]);

        // if(!is_null($imageStatus)) {

        //     return back()->with("success", "Image uploaded successfully.");
        // }

        // else {
        //     return back()->with("failed", "Failed to upload image.");
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request, $file)
    {
        return response()->download(public_path('assets/'.$file));
    //    return DB::table('invoice_uploads')->where('id',$id)->first();

        // $filepath=public_path("public/assets/{$data->upload}");
        // return Response::download($filepath);
//        return \response()->download($filepath);
        // dd($request);
        // return response()->download(public_path('/assets'.$id));
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
        // $data= InvoiceUpload::find($id);
        try {
            $agency=InvoiceUpload::find($id);
            return view('upload.edit',compact('agency'));
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $agency=InvoiceUpload::find($id);
        $agency->status=$request->status;
        $agency->save();
        return redirect(route('invoiceuoload.index'))->with('success','Funding Agency Update Successfully');

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
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        // abort_unless(auth()->user()->can('delete_invoice'),403,'you dont have required authorization to this resource');

        $items = InvoiceUpload::find($id); //Reports is my model



        $file_path = public_path('assets').'/'.$items->file; // if your file is in some folder in public directory.


        // $file_path = public_path().'/'.$items->file;  use incase you didn't store your files in any folder inside public folder.

        if(File::exists($file_path)) {

            File::delete($file_path); //for deleting only file try this
            $items->delete(); //for deleting record and file try both
        }

//        $file = InvoiceUpload::find($request->id);
//        $file_path = $file->file;
//        if(file_exists($file_path))
//        {
//            unlink($file_path);
//            InvoiceUpload::destroy($request->id);
//        }
//        $file=InvoiceUpload::find($id);
//        $filename=$file->file;
////        $file_path=public_path('assets/' .$filename);
//
//        if(File::exists(public_path('assets/' .$filename))){
//
//            File::delete(public_path('assets/' .$filename));
//
//        }else{
//
//            dd('File does not exists.');
//
////        }
//        $news = InvoiceUpload::findOrFail($id);
//        $image_path = app_path("assets/{$news}");
//
//        if (File::exists($image_path)) {
//            //File::delete($image_path);
//            unlink($image_path);
//        }
//        $news->delete();

//        $file =public_path('assets/');
//        $img=File::delete($file);
//        dd($img);
//        // DB::table('invoice_uploads')
        // $data=InvoiceUpload::find($id);
        // unlink('assets/'.$data->file);
        // $data->delete();

        // $file=InvoiceUpload::findOrFail($id);
        // $image=$file->file;
        //  dd($image);
        // $file->delete();
        // return redirect()->route('invoiceuoload.index');
        // $filename=File::find($id);
//        .....................delete...................
//        $file=InvoiceUpload::find($id);
//        $filename=$file->file;
//        $file_path=public_path('assets/' .$filename);
//        unlink($file_path,);
//        echo $file->delete();
//        ...................
        // return redirect()->route('invoiceuoload.index');
        return redirect(route('invoiceuoload.index'))->with('success',' delete Successfully');


        // $image_path = "/assets/Print view - phpMyAdmin 5.1.1.pdf";  // Value is not URL but directory file path
        // if(File::exists($image_path)) {
        // File::delete($image_path);
// }
        // try {
        //    return InvoiceUpload::destroy($id);

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
        // if (file_exists($id)) {
        //     return unlink($id);
        // } else {
        //     echo('File not found.');
        // }
        // $file=public_path("assets",$id);
        // $data=File::delete($file);
        // dd($data);
        // // dd($id);
        // $image = InvoiceUpload::find($request->id);

        // unlink("assets/".$image->image_name);

        // InvoiceUpload::where("id", $id)->delete();

        // return back()->with("success", "Image deleted successfully.");


    }

    // public function approved(Request $request , $id) {
    //     $request->validate([
    //         DB::table('invoice_uploads')
    //         ->where('id', $item->id)->update(['status' => "approved"])
    //     ]);
        
    //     return redirect(route('invoiceuoload.index'))->with('success',' status update Successfully');

    // }
    // public function approved($id)
    // {
    //     return view('upload.edit');
    //     // $application=InvoiceUpload::where('id','=',$id)->first();
    //     // dd($application);
     
    //     // if($application){
     
    //     //   $application->status='approved';
    //     //   return redirect()->back()->with('info','The application was approved successfully');
    //     // }
    //  }
     
    // public function cancle($id)
    //  {
    //    $application=InvoiceUpload::where('id','=',$id)->first();
    //        if($application){
     
    //          $application->status='cancle';
     
    //        return redirect()->back()->with('error','The application was disapproved successfully');
     
    //    }
    // }

    // public function approved($id){
    //     try {
    //         InvoiceUpload::where('id',$id)->update(['status'=>'approved']);
    //         return redirect()->back();
    //         // $data= InvoiceUpload::find($id);
    //         // $data->status='approved';
            
    //         // $data->save();
    //         // return redirect(route('invoiceuoload.index'))->with('success',' update Successfully');
    //         //code...
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }

        
    // }
    // public function cancle($id){
    //     $data= InvoiceUpload::find($id);
    //     $data->status='cancle';
    //     $data->update();
    //     return redirect(route('invoiceuoload.index'))->with('success',' delete Successfully');
        
    // }

    public function search(Request $request){
        // Get the search value from the request
       $search = $request->input('search');

       // Search in the title and body columns from the posts table
       $invoiceupload = InvoiceUpload::query()
           ->where('name', 'LIKE', "%{$search}%")
           ->orWhere('bill_no', 'LIKE', "%{$search}%")
           ->get();
        

        // Return the search view with the resluts compacted
        return view('upload.search', compact('invoiceupload'));
    }

    
}
