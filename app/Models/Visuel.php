<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visuel extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
