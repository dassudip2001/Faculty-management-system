<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\show\ProjectViewController;
use App\Http\Controllers\show\UserViewController;
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
    Route::delete('/department/delete/{id}',[DepartmentController::class,'destroy'])->name('destroy')->middleware(['auth','role:admin']);

// Faculty Routes
   Route::get('/faculty',[FacultyController::class,'index'])->name('faculty.index');
   Route::post('/faculty',[FacultyController::class,'create'])->name('faculty.create')->middleware(['auth','role:admin']);
   Route::get('/faculty/edit/{id}',[FacultyController::class,'edit'])->name('faculty.edit');
   Route::put('/faculty/edit/{id}',[FacultyController::class,'update'])->name('faculty.update');
   Route::delete('/faculty/delete/{id}',[FacultyController::class,'destroy'])->name('faculty.destroy');

// user create
   Route::get('/createuser',[CreateUserController::class,'index'])->name('usercreate.index');
   Route::post('/createuser',[CreateUserController::class,'create'])->name('usercreate.create')->middleware(['auth','role:admin']);
   Route::get('/createuser/edit/{id}',[CreateUserController::class,'edit'])->name('usercreate.edit');
   Route::put('/createuser/edit/{id}',[CreateUserController::class,'update'])->name('usercreate.update');
   Route::delete('/createuser/delete/{id}',[CreateUserController::class,'destroy'])->name('usercreate.destroy');

//   funding agency
    Route::get('/funding',[FundingAgencyController::class,'index'])->name('funding.index');
    Route::post('/funding',[FundingAgencyController::class,'create'])->name('funding.create')->middleware(['auth','role:admin']);
    Route::get('/funding/edit/{id}',[FundingAgencyController::class,'edit'])->name('funding.edit');
    Route::put('/funding/edit/{id}',[FundingAgencyController::class,'update'])->name('funding.update');
    Route::delete('/funding/delete/{id}',[FundingAgencyController::class,'destroy'])->name('funding.destroy');

//    Budget Head
    Route::get('/budget',[BudgetHeadController::class,'index'])->name('budget.index');
    Route::post('/budget',[BudgetHeadController::class,'create'])->name('budget.create')->middleware(['auth','role:admin']);
    Route::get('/budget/edit/{id}',[BudgetHeadController::class,'edit'])->name('budget.edit');
    Route::put('/budget/edit/{id}',[BudgetHeadController::class,'update'])->name('budget.update');
    Route::delete('/budget/delete/{id}',[BudgetHeadController::class,'destroy'])->name('budget.destroy');

//Project
    Route::get('/project',[ProjectController::class,'index'])->name('project.index');
    Route::post('/project',[ProjectController::class,'create'])->name('project.create')->middleware(['auth','role:admin']);
    Route::get('/project/edit/{id}',[ProjectController::class,'edit'])->name('project.edit')->middleware(['auth','role:admin']);
    Route::put('/project/edit/{id}',[ProjectController::class,'update'])->name('project.update')->middleware(['auth','role:admin']);
    Route::delete('/project/delete/{id}',[ProjectController::class,'destroy'])->name('project.destroy')->middleware(['auth','role:admin']);

// Project Details
    Route::get('/projectdetail',[ProjectDetailsController::class,'index'])->name('projectdetail.index');
    Route::post('/projectdetail',[ProjectDetailsController::class,'create'])->name('projectdetail.create')->middleware(['auth','role:admin']);
    Route::get('/projectdetail/edit/{id}',[ProjectDetailsController::class,'edit'])->name('projectdetail.edit')->middleware(['auth','role:admin']);
    Route::put('/projectdetail/edit/{id}',[ProjectDetailsController::class,'update'])->name('projectdetail.update')->middleware(['auth','role:admin']);
    Route::delete('/projectdetail/delete/{id}',[ProjectDetailsController::class,'destroy'])->name('projectdetail.destroy')->middleware(['auth','role:admin']);


    // budget amount calculation

   Route::get('/projectbudgetamount',[ProjectBudgetAmountController::class,'index'])->name('projectbudgetamount.index');
   Route::post('/projectbudgetamount',[ProjectBudgetAmountController::class,'create'])->name('projectbudgetamount.create')->middleware(['auth','role:admin']);
   Route::get('/projectbudgetamount/edit/{id}',[ProjectBudgetAmountController::class,'edit'])->name('projectbudgetamount.edit');
   Route::put('/projectbudgetamount/edit/{id}',[ProjectBudgetAmountController::class,'update'])->name('projectbudgetamount.update');
   Route::delete('/projectbudgetamount/delete/{id}',[ProjectBudgetAmountController::class,'destroy'])->name('projectbudgetamount.destroy');


    // invoice upload

    Route::get('/invoiceuoload',[InvoiceUploadController::class,'index'])->name('invoiceuoload.index');
    Route::post('/invoiceuoload',[InvoiceUploadController::class,'create'])->name('invoiceuoload.create');
    Route::get('/download/{id}',[InvoiceUploadController::class,'download']);
    Route::get('/view/{id}',[InvoiceUploadController::class,'view']);
    Route::delete('/delete/{id}',[InvoiceUploadController::class,'destroy']);


