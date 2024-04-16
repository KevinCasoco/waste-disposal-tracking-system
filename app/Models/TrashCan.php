<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashCan extends Model
{
    use HasFactory;

    protected $fillable = [
        'trash_weight',
    ];
}
