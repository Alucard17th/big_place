<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    // specify the table
    protected $table = 'message';

    protected $fillable = ['message', 'from', 'to', 'is_read', 'user_id'];
}
