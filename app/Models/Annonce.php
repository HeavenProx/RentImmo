<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'adresse',
        'prix',
        'metre',
        'chambre',
        'salleDeBain',
        'type',
        'parking',
        'garage',
        'terrain',
        'etat',
    ];

    public function images()
    {
        return $this->hasMany(AnnonceImage::class);
    }
}
