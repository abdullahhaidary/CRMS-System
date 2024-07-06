<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class crime_register_record_information extends Model
{
    use HasFactory;
    protected $table='crime_register_record_information';

    public function people()
    {
        return $this->belongsTo(People::class, 'people_id');
    }


}
