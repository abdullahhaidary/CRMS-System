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

    public function case()  {
        return $this->belongsTo(casemodel::class);
    }

    public function suspect(){
        return $this->belongsTo(suspectmodel::class,'suspect_id');
    }
    public function courts(){
        return $this->hasMany(Court::class);
    }
}
