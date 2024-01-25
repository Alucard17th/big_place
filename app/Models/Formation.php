<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'training_duration',
        'start_date',
        'end_date',
        'cdi_at_hiring',
        'skills_acquired',
        'work_location',
        'open_positions' ,
        'registration_deadline',
        'upload_documents',
        'status',
        'user_id',
        'max_participants',
        'subscribers'
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
