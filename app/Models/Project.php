<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Project extends Model
{
    use HasFactory,Notifiable, HasRoles;
    protected $fillable=[
      'project_no',
      'project_title',
      'project_scheme',
      'project_duration',
      'project_total_cost'
    ];

    // public function agency()
    // {
    //    return $this->belongsTo(FundingAgency::class,'funding_agency_id','id');

    //  }
    public function fundingagency(){
      return $this->belongsTo(FundingAgency::class,'funding_agency_id','id');

  }
  public function createuser(){
      return $this->belongsTo(CreateUser::class,'create_user_id','id');
  }

}
