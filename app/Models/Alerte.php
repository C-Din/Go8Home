<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function lieu()
    {
        return $this->belongsTo(Lieu::class);
    }

    public function typeBien()
    {
        return $this->belongsTo(TypeBien::class);
    }
}
