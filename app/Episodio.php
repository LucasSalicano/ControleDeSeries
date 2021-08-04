<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ["numero"];

    public function Temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
