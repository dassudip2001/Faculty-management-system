<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
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

}
