<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculum';

    protected $fillable = [
        'nom',
        'prenom',
        'ville_domiciliation',
        'metier_recherche',
        'pretentions_salariales',
        'annees_experience',
        'niveau',
        'niveau_etudes',
        'valeurs',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
