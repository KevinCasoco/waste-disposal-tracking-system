<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'users_id',
        'start',
        'time',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
