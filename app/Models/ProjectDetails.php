<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class ProjectDetails extends Model
{
    use HasFactory,Notifiable, HasRoles;
    protected $fillable=[
        'id',
        'project_id',
        'funding_agency_id',
        'create_user_id',
        'budget_id',
        'budgetdetails_id',
    ];
    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }

    public function budgethead(){
        return $this->belongsToMany(BudgetHead::class,'budget_id','id');
    }

}
