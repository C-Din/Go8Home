<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function typeBien()
    {
        return $this->belongsTo(TypeBien::class);
    }

    public function lieu()
    {
        return $this->belongsTo(Lieu::class);
    }

    public function favori()
    {
        return $this->hasMany(Favori::class);
    }

    public function visuel()
    {
        return $this->hasMany(Visuel::class);
    }

    public function commoditeBien()
    {
        return $this->hasMany(CommoditeBien::class);
    }
}
