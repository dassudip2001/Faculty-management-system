<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceUpload extends Model
{
    use HasFactory;
   
    protected $fillable=[
     'name',
     'file',
    ];
    // public function project_details(){
        // return $this->belongsToMany(ProjectBudgetAmount::class,'project_budget_amount_id','id');
    // }
}
