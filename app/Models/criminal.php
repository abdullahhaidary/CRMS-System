<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class criminal extends Model
{
    use HasFactory;
    protected $table ='criminals';
    protected $fillable = [

    ];
    public function picture(){
       return $this->hasMany(CriminalPicture::class,'criminal_id');
    }
    public function case(){
        return $this->hasMany(casemodel::class, 'case_id');
    }
}
