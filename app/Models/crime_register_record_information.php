<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crime_register_record_information extends Model
{
    use HasFactory;
    protected $table='crime_register_record_information';

    public function people()
    {
        return $this->belongsTo(People::class, 'people_id');
    }
    static public function getSingle($id)
    {
        return crime_register_record_information::find($id);
    }
}
