<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'img'
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
    ];
    public $timestamps = true;
}
