<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected static function boot()
    {
        parent::boot();

        /** @var Model $model */
        static::updating(function ($model) {
//            dd($model);
            if ($model->isDirty('img') && ($model->getOriginal('img') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('img'));
            }
        });

        static::deleting(function ($model) {
            if ($model->img !== null) {
                Storage::disk('public')->delete($model->img);
            }
        });
    }
}
