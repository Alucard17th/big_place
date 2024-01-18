<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_entreprise',
        'date_creation',
        'domiciliation',
        'siege_social',
        'valeurs_fortes',
        'nombre_implementations',
        'effectif',
        'fondateurs',
        'chiffre_affaire',
        'user_id',
        'vues',
        'sector'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vues()
    {
        return $this->hasMany(Vues::class, 'entreprise_id');
    }
}
