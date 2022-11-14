<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class FundReleseBudgetModule extends Model
{
    public $table="fund_relese_budget_modules";
    use HasFactory ,Notifiable, HasRoles;
    protected $fillable=[
        'relese_fund_id',
        'relese_fund_budget_id',
        'fund_relese_budget_amount',

    ];

    public function releseFund(){
        return $this->belongsTo(ReleseFund::class,'relese_fund_id','id');
    }

    // public function fundReleseBudget(){
    //     return $this->belongsToMany(BudgetHead::class,'relese_fund_budget_id','id');
    // }

    public function budgethead(){
        return $this->belongsToMany(BudgetHead::class,'relese_fund_budget_id','id');
    }

}
