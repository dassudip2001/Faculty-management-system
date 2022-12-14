<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\show\ProjectViewController;
use App\Http\Controllers\show\UserViewController;
use App\Http\Controllers\ReleseFund\ReleseFundController;
use App\Http\Controllers\FundReleseBudget\FundReleseBudgetController;
use App\Http\Controllers\ProjectBudgetAmount\ProjectBudgetAmountController;
use App\Http\Controllers\InvoiceUpload\InvoiceUploadController;
use App\Http\Controllers\ProjectDetails\ProjectDetailsController;
use App\Http\Controllers\BudgetHead\BudgetHeadController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\FundingAgency\FundingAgencyController;
use App\Http\Controllers\user\CreateUserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Faculty\FacultyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
//use App\Http\Controllers\BudgetDetailsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Welcome page
Route::get('/', function () {
    return view('welcome');
});
//Dashboard Page
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//Admin Route
Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');



});
require __DIR__.'/auth.php';
//
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('permission:write post');
//Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('role:editor|admin');
// department Route
    Route::get('/department',[DepartmentController::class,'index'])->name('index');
    Route::post('/department',[DepartmentController::class,'create'])->name('create')->middleware(['auth','role:admin']);
    Route::get('/department/edit/{id}',[DepartmentController::class,'edit'])->name('edit')->middleware(['auth','role:admin']);
    Route::put('/department/edit/{id}',[DepartmentController::class,'update'])->name('update')->middleware(['auth','role:admin']);
    Route::get('/department/delete/{id}',[DepartmentController::class,'destroy'])->name('destroy')->middleware(['auth','role:admin']);
    // download pdf
    Route::get('/department/download',[DepartmentController::class,'pdf']);
    // at a time one pdf
    Route::get('/department/pdfForm/{id}',[DepartmentController::class,'pdfForm']);
//    search
    Route::get('/search', [DepartmentController::class,'search'])->name('search');
    //  search
    Route::get('/fundingsearch', [FundingAgencyController::class,'search'])->name('funding.search');
       //  search
    Route::get('/budgetssearch', [BudgetHeadController::class,'search'])->name('budget.search');

    //    search
    Route::get('/usersearch', [CreateUserController::class,'search'])->name('usercreate.search');


//    search
    Route::get('/invoiceupload',[InvoiceUploadController::class,'search'])->name('invoiceupload.search');

//search
    Route::get('/relesefundsearch',[ReleseFundController::class,'search'])->name('relesefund.search');

   Route::get('/projectdetailsearch', [ProjectDetailsController::class,'search'])->name('projectdetail.search');

// Faculty Routes
   Route::get('/faculty',[FacultyController::class,'index'])->name('faculty.index');
   Route::post('/faculty',[FacultyController::class,'create'])->name('faculty.create')->middleware(['auth','role:admin']);
   Route::get('/faculty/edit/{id}',[FacultyController::class,'edit'])->name('faculty.edit');
   Route::put('/faculty/edit/{id}',[FacultyController::class,'update'])->name('faculty.update');
   Route::get('/faculty/delete/{id}',[FacultyController::class,'destroy'])->name('faculty.destroy');

// user create
   Route::get('/createuser',[CreateUserController::class,'index'])->name('usercreate.index');
   Route::post('/createuser',[CreateUserController::class,'create'])->name('usercreate.create')->middleware(['auth','role:admin']);
   Route::get('/createuser/edit/{id}',[CreateUserController::class,'edit'])->name('usercreate.edit');
   Route::put('/createuser/edit/{id}',[CreateUserController::class,'update'])->name('usercreate.update');
   Route::get('/createuser/delete/{id}',[CreateUserController::class,'destroy'])->name('usercreate.destroy');
   // download pdf
   Route::get('/createuser/download',[CreateUserController::class,'pdf']);
   // at a time one pdf
   Route::get('/createuser/pdfForm/{id}',[CreateUserController::class,'pdfForm']);


//   funding agency
    Route::get('/funding',[FundingAgencyController::class,'index'])->name('funding.index');
    Route::post('/funding',[FundingAgencyController::class,'create'])->name('funding.create')->middleware(['auth','role:admin']);
    Route::get('/funding/edit/{id}',[FundingAgencyController::class,'edit'])->name('funding.edit');
    Route::put('/funding/edit/{id}',[FundingAgencyController::class,'update'])->name('funding.update');
    Route::get('/funding/delete/{id}',[FundingAgencyController::class,'destroy'])->name('funding.destroy');
     // download pdf
     Route::get('/funding/download',[FundingAgencyController::class,'pdf']);
     // at a time one pdf
     Route::get('/funding/pdfForm/{id}',[FundingAgencyController::class,'pdfForm']);



//    Budget Head
    Route::get('/budget',[BudgetHeadController::class,'index'])->name('budget.index');
    Route::post('/budget',[BudgetHeadController::class,'create'])->name('budget.create')->middleware(['auth','role:admin']);
    Route::get('/budget/edit/{id}',[BudgetHeadController::class,'edit'])->name('budget.edit');
    Route::put('/budget/edit/{id}',[BudgetHeadController::class,'update'])->name('budget.update');
    Route::get('/budget/delete/{id}',[BudgetHeadController::class,'destroy'])->name('budget.destroy');
    // download pdf
    Route::get('/budget/download',[BudgetHeadController::class,'pdf']);
    // at a time one pdf
    Route::get('/budget/pdfForm/{id}',[BudgetHeadController::class,'pdfForm']);

//Project
    Route::get('/project',[ProjectController::class,'index'])->name('project.index');
    Route::post('/project',[ProjectController::class,'create'])->name('project.create')->middleware(['auth','role:admin']);
    Route::get('/project/edit/{id}',[ProjectController::class,'edit'])->name('project.edit')->middleware(['auth','role:admin']);
    Route::put('/project/edit/{id}',[ProjectController::class,'update'])->name('project.update')->middleware(['auth','role:admin']);
    Route::get('/project/delete/{id}',[ProjectController::class,'destroy'])->name('project.destroy')->middleware(['auth','role:admin']);

// Project Details
    Route::get('/projectdetail',[ProjectDetailsController::class,'index'])->name('projectdetail.index');
    Route::post('/projectdetail',[ProjectDetailsController::class,'create'])->name('projectdetail.create');
    Route::get('/projectdetail/edit/{id}',[ProjectDetailsController::class,'edit'])->name('projectdetail.edit')->middleware(['auth','role:admin']);
    Route::put('/projectdetail/edit/{id}',[ProjectDetailsController::class,'update'])->name('projectdetail.update')->middleware(['auth','role:admin']);
    Route::get('/projectdetail/delete/{id}',[ProjectDetailsController::class,'destroy'])->name('projectdetail.destroy')->middleware(['auth','role:admin']);
    // download pdf
    Route::get('/projectdetail/download',[ProjectDetailsController::class,'pdf']);
    // at a time one pdf
    Route::get('/projectdetail/pdfForm/{id}',[ProjectDetailsController::class,'pdfForm']);
    //  show all details for projects details page
    Route::get('/projectdetails/showall/{id}',[ProjectDetailsController::class,'showall'])->name('projectdetails.showall');

    // budget amount calculation

//    Route::get('/projectbudgetamount',[ProjectBudgetAmountController::class,'index'])->name('projectbudgetamount.index');
//    Route::post('/projectbudgetamount',[ProjectBudgetAmountController::class,'create'])->name('projectbudgetamount.create')->middleware(['auth','role:admin']);
//    Route::get('/projectbudgetamount/edit/{id}',[ProjectBudgetAmountController::class,'edit'])->name('projectbudgetamount.edit');
//    Route::put('/projectbudgetamount/edit/{id}',[ProjectBudgetAmountController::class,'update'])->name('projectbudgetamount.update');
//    Route::get('/projectbudgetamount/delete/{id}',[ProjectBudgetAmountController::class,'destroy'])->name('projectbudgetamount.destroy');
// //
//    Route::get('/projectbudgetamount/find/{p_id}',[ProjectBudgetAmountController::class,'find'])->name('projectbudgetamount.find');


    // invoice upload

    Route::get('/invoiceuoload',[InvoiceUploadController::class,'index'])->name('invoiceuoload.index');
    Route::post('/invoiceuoload',[InvoiceUploadController::class,'create'])->name('invoiceuoload.create');
    Route::get('/download/{file}',[InvoiceUploadController::class,'download']);
    Route::get('/view/{id}',[InvoiceUploadController::class,'view']);
    Route::get('invoiceuoload/delete/{id}',[InvoiceUploadController::class,'destroy']);
        //  search
//    Route::get('/search', [InvoiceUploadController::class,'search'])->name('search');


    //fund relies
    Route::get('/relesefund',[ReleseFundController::class,'index'])->name('relesefund.index');
    Route::post('/relesefund',[ReleseFundController::class,'create'])->name('relesefund.create');
    Route::get('/relesefund/edit/{id}',[ReleseFundController::class,'edit'])->name('relesefund.edit');
    Route::put('/relesefund/edit/{id}',[ReleseFundController::class,'update'])->name('relesefund.update');
    Route::get('/relesefund/delete/{id}',[ReleseFundController::class,'destroy'])->name('relesefund.destroy');
    // all pdf
    Route::get('/relesefund/download',[ReleseFundController::class,'pdf']);
    // at a time one pdf
    Route::get('/relesefund/pdfForm/{id}',[ReleseFundController::class,'pdfForm']);
//   search Relese fund 
        //  search
    Route::get('/relesefund/showall/{id}',[ReleseFundController::class,'showall'])->name('relesefund.showall');



//    Route::get('/search', [ReleseFundController::class,'search'])->name('search');


    Route::get('/projectbudgetamount',[FundReleseBudgetController::class,'index'])->name('projectbudgetamount.index');
    Route::post('/projectbudgetamount',[FundReleseBudgetController::class,'create'])->name('projectbudgetamount.create');
    Route::get('/projectbudgetamount/edit/{id}',[FundReleseBudgetController::class,'edit'])->name('projectbudgetamount.edit');
    Route::put('/projectbudgetamount/edit/{id}',[FundReleseBudgetController::class,'update'])->name('projectbudgetamount.update');
    Route::get('/projectbudgetamount/delete/{id}',[FundReleseBudgetController::class,'destroy'])->name('projectbudgetamount.destroy');








