<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $fillable  = ['date', 'heure', 'status', 'user_id', 'participant', 'is_type_distanciel', 'is_type_presentiel', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
