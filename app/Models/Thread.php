<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function participant(){
        return $this->belongsTo(User::class, 'participant_id');
    }

    public function emails(){
        return $this->hasMany(Email::class, 'thread_id');
    }
}
