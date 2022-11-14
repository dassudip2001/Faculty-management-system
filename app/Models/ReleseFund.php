<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleseFund extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'transaction_no',
        'payment_method',
        'transtation_date',
        'payment_method_no',
        'relese_funds_amount',
        'projec_fund_relese_id'
    ];
    // public function projectFund(){
    //     return $this->belongsTo(Project::class,'projec_fund_relese_id','id');
    // }
}
