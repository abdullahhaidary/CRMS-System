<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casemodel extends Model
{
    use HasFactory;
    protected $table='cases';

    public function criminal(){
        return $this->belongsTo(criminal::class, 'case_id');
    }
}
