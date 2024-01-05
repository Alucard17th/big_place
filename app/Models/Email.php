<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'receiver_id',
        'draft',
        'trash'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
