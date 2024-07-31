<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinceaccount extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'province',
        'district',
    ];
    protected $table='province_account';
}
