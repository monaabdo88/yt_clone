<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisLike extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
