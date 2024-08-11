<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    protected $fillable = ['criminal_id', 'ariza_before', 'ariza_after', 'result'];

    public function criminal()
    {
        return $this->belongsTo(criminal::class);
    }
}
