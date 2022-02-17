<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommoditeBien extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }

    public function commodite()
    {
        return $this->belongsTo(Commodite::class);
    }
}
