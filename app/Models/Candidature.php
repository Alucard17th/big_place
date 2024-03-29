<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function candidat()
    {
        return $this->belongsTo(User::class, 'candidat_id');
    }

    public function offer(){
        return $this->belongsTo(Offre::class, 'offer_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'candidature_id');
    }

    public function rendezvous()
    {
        return $this->hasMany(RendezVous::class, 'candidature_id');
    }
    
}
