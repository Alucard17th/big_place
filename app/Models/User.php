<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'siret',
        'birth_date',
        'avatar',
        'parent_entreprise_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function curriculum()
    {
        return $this->hasMany(Curriculum::class, 'user_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    public function rendezvous()
    {
        return $this->hasMany(RendezVous::class, 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'user_id');
    }

    public function offers()
    {
        return $this->hasMany(Offre::class, 'user_id');
    }

    public function entreprise()
    {
        return $this->hasMany(Entreprise::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }

    public function formations()
    {
        return $this->hasMany(Formation::class, 'user_id');
    }

    public function emails()
    {
        return $this->hasMany(Email::class, 'user_id');
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class, 'user_id');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'user_id');
    }

    public function participationEvents()
    {
        return $this->belongsToMany(Event::class);
    }

    public function participationFormations()
    {
        return $this->belongsToMany(Formation::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
