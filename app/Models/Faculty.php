<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Faculty extends Model
{
    use HasFactory,Notifiable, HasRoles;
    protected $fillable=[

        'fac_code',
        'fac_title',
        'fac_designtion',
        'fac_join' ,
        'fac_retirement',
        'fac_phone',
        'fac_status',
        'fac_descriptio',

    ];
}
