<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashBin extends Model
{
    use HasFactory;

    protected $fillable = [
        'trash_bin_location',
        'latitude',
        'longitude',
    ];
}
