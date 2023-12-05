<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'users_id', 'start_date', 'time'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
