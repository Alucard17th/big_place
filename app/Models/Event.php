<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_name',
        'job_position' ,
        'participants_count' ,
        'event_address',
        'free_entry' ,
        'digital_badge_download' ,
        'required_documents' ,
        'event_date' ,
        'event_hour' ,
        'user_id',
        'description', 
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }
}
