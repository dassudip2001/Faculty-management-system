<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use App\Models\CreateUser;
use Database\Seeders\AdminSeeder;
use Exception;
use PDF;

class CreateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $createUser= CreateUser::all();
//        $faculty=Faculty::all();
            $data=Department::all();
            return view('user.create',compact('data','createUser',));
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

       abort_unless(auth()->user()->can('create_user'),403,'you dont have required authorization to this resource');
//        try {
//               dd($request->all());
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'fac_code' => 'required|unique:faculties|max:50',
                'fac_title' => 'required',
                'fac_join' => 'required',
                'fac_retirement'=>'required',
                'fac_designtion' => 'required',
                'fac_phone' => 'required',
                'fac_status' => 'required',
                'fac_description' => 'required',
            ]);
            $fields=$request->only(['name','email','password'
              ,'fac_code','fac_title','fac_join','fac_retirement',
               'fac_designtion','fac_phone','fac_status','fac_description',
                'department_id',
            ]);
            $user = new User([
                'name'=>$fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]);
            $user->save();
            $faculty = new Faculty([
                'fac_code' => $fields['fac_code'],
                'fac_title' => $fields['fac_title'],
                'fac_designtion' => $fields['fac_designtion'],
                'fac_join' => $fields['fac_join'],
                'fac_retirement' => $fields['fac_retirement'],
                'fac_phone' => $fields['fac_phone'],
                'fac_status' => $fields['fac_status'],
                'fac_description' => $fields['fac_description'],
            ]);
            $faculty->save();
            $pivot=new CreateUser();
            $pivot->user_id=$user->id;
            $pivot->faculty_id=$faculty->id;
            $pivot->department_id=$fields['department_id'];
            $pivot->save();
            return redirect(route('usercreate.index'))->with('success','User Created Successfully');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
           // if (!Auth::user()->id)
        // if (Auth::user()->id == $id ) {
            // if(Auth::user()->id=='1'|| auth()->user()->id==$id)
            if(Auth::user()->id=='1' || auth()->user()->id==$id+1)
            {
            $createUser= CreateUser::with(
            [
                'user' => function ($q) {
                    $q->select(['id', 'name', 'email',]);
                },
                'faculty' => function ($q) {
                    $q->select(['id', 'fac_code', 'fac_title','fac_designtion',
                        'fac_join','fac_retirement','fac_phone','fac_status','fac_description']);
                },
                'department' => function ($q) {
                    $q->select(['id',  'dept_code']);
                }
            ]
        )->find( $id);
                  return view('user.edit',compact('createUser'));
            }else {
                return "You cannot edit details ";
            }
            // abort_unless(auth()->user()->can('edit_user'),403,'you dont have required authorization to this resource');

           
        // }
           
        // } 
        // else{
            // return "you don't have right permission to edit details";
    }
         


//        try {
////           $createUser= CreateUser::with('faculty','user','department')
////            ->get();
//
//        }catch (Exception $e){
//
//            return ["message" => $e->getMessage(),
//                "status" => $e->getCode()
//            ];
//        }

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, int $id)
    {
//        if (!Auth::user()->id)
//        try {
//            $createUser=CreateUser::find($id);
//            $faculty=Faculty::find($createUser->faculty_id);
//            if ($createUser==null){
//                abort(501, "Opps! There no record associate with this id $id");
//            }
//
//             $this->validate($request,[
//                 'name' => 'required|string|max:255',
//                 'password' => 'required|string|confirmed|min:8',
//                 'fac_phone'=>'required' ,
//                 'fac_description'=>'required' ,
//                 ]);
//                 $fields=$request->only(['name','password',
//                     'fac_phone','fac_description',
//                 ]);
//            $user = new User([
//                'name'=>$fields['name'],
//
//                'password' => bcrypt($fields['password']),
//            ]);
//            $user->save();
//
//            $faculty = new Faculty([
//                'fac_phone' => $fields['fac_phone'],
//                'fac_description' => $fields['fac_description'],
//            ]);
//            $faculty->save();
//            if (!Auth::user()->id)
            // if (Auth::user()->id == $id ) {
                if(Auth::user()->id=='1'|| Auth::user()->id==$id+1){
                try {
                    $this->validate($request, [
                        'name' => 'required|string|max:255',
    //                'email' => 'required|string|email|max:255|unique:users',
                        'password' => 'required|string|confirmed|min:8',
                        'fac_title' => 'required',
                        'fac_designtion' => 'required',
                        'fac_phone' => 'required',
                        'fac_status' => 'required',
                        'fac_description' => 'required',
                    ]);
                    $fields = $request->only(['name', 'password'
                        , 'fac_title', 'fac_designtion', 'fac_phone', 'fac_status', 'fac_description',
                    ]);
                    $fc = CreateUser::find($id)->faculty_id;
                    $uc = CreateUser::find($id)->user_id;
    //            faculty Delete
                    $faculty = Faculty::find($fc);
    //            $faculty->fac_code=$fields->fac_code;
                    $faculty->fac_title = $fields['fac_title'];
                    $faculty->fac_designtion = $fields['fac_designtion'];
                    $faculty->fac_phone = $fields['fac_phone'];
                    $faculty->fac_status = $fields['fac_status'];
                    $faculty->fac_description = $fields['fac_description'];
                    $faculty->save();
    //            user delete
                    $user = User::find($uc);
                    $user->name = $fields['name'];
                    $user->password = bcrypt($fields['password']);
                    $user->save();
                    //            create user delete
                    CreateUser::find($id)->save();
                    return redirect(route('usercreate.index'))
                        ->with('success', 'User Update Successfully');
                    //code...
                } catch (Exception $e){

                    return ["message" => $e->getMessage(),
                        "status" => $e->getCode()
                    ];
                }

            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(int $id)
    {
        abort_unless(auth()->user()->can('delete_user'),403,'you dont have required authorization to this resource');

        try {

            $fc=CreateUser::find($id)->faculty_id;
            $uc=CreateUser::find($id)->user_id;
//            create user delete
            CreateUser::find($id)->delete();
//            faculty Delete
            Faculty::find($fc)->delete();
//            user delete
            User::find($uc)->delete();
            return redirect(route('usercreate.index'))->with('success', 'User Deleted Successfully');



        }catch (Exception $e){

            return ["message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }


      // pdf generate all pdf
      public function pdf(){
        $createUser2=CreateUser::all();
        $pdf=PDF::loadView('user.print',compact('createUser2'));
        return $pdf->download('user.pdf');
   }
    // generate pdf one row
    public function pdfForm(Request $request,$id){
    $createUser1 = CreateUser::all()->where('id', $id);  
    $pdf=PDF::loadView('user.pdf_download',compact('createUser1'));
    return $pdf->download('user.pdf');
    }
}
