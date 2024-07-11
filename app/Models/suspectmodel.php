<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suspectmodel extends Model
{
    use HasFactory;
    protected $table='suspect';

    protected $fillable = [
        'crime_record_id',
        'name',
        'last_name',
        'phone',
        'email',
        'actual_address',
        'current_address',
        'father_name',
    ];
    public function fingerprints()
    {
        return $this->hasOne(FingerprintModel::class);
    }
}
