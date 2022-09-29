<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\request;
class IndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}