<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class People extends Model
{
    use HasFactory;
    protected $table ='people';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'last_name',
        'father_name',
        'email',
        'phone',
        'tazkira_number',
        'actual_address',
        'current_address',
        'crime_case',
        'ariza',
        'subject_crim',
        'crim_date',
    ];

    public function details()
    {
        return $this->hasOne(crime_register_record_information::class, 'people_id');
    }

}
