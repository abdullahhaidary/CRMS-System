<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FingerprintModel extends Model
{
    use HasFactory;
    protected $table = 'suspect_fingerprint';
    protected $fillable = [
        'suspect_id',
        'right_thumb',
        'right_index',
        'right_middle',
        'right_ring',
        'right_pinky',
        'left_thumb',
        'left_index',
        'left_middle',
        'left_ring',
        'left_pinky',
    ];
    public function suspect()
    {
        return $this->belongsTo(suspectmodel::class);
    }
}
