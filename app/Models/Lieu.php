<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function bien()
    {
        return $this->hasMany(Bien::class);
    }
    public function alerte()
    {
        return $this->hasMany(Alerte::class);
    }
}
