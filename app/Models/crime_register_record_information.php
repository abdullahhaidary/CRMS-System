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
//    static public function getSingle($id)
//    {
//        return crime_register_record_information::find($id);
//    }
//    static public function geteditdescription($id)
//    {
//        $data=people::getSingle($id);
//        $data=DB::table('crime_register_record_information')
//            ->join('people', 'people.id', '=','crime_register_record_information.people_id')
//            ->select('crime_register_record_information.*', 'people.name')
//            ->get();
//
//        return $data;
//    }
}
