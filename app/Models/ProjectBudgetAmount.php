<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBudgetAmount extends Model
{
    public $table = "project_budget_amounts";
    use HasFactory;
    protected $fillable=[
        'year',
        'project_budge_amount',
        'project_details_id',
    ];
    public function project_details(){
        return $this->belongsToMany(ProjectDetails::class,'project_details_id','id');
    }
}
