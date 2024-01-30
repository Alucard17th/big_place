<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'description',
        'location_city',
        'location_address',
        'location_postal_code',
        'rome_code',
        'contract_type',
        'updated_at',
        'work_schedule',
        'weekly_hours',
        'experience_level',
        'desired_languages',
        'education_level',
        'brut_salary',
        'industry_sector',
        'benefits',
        'publication_date',
        'unpublish_date',
        'selected_jobboards',
        'advertising_costs',
        'user_id',
        'post_tasks',
        'location_country',
        'location_state',
        'company_name',
        'url',
        'source'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
