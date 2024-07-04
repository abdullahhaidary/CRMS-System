<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peoplemolde extends Model
{
    use HasFactory;
    protected $table='people';

    public function crimeinformation()
    {
        return $this->hasMany(crime_register_record_information::class);
    }
}
