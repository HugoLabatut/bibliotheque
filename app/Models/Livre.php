<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = ['titre', 'auteur_id'];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }
}
