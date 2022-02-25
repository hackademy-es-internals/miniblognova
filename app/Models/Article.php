<?php

namespace App\Models;

use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'meta' => 'array'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10)
              ->withResponsiveImages();
        
        $this->addMediaConversion('thumb-cropped')
                ->crop('crop-center', 200, 200)
                ->withResponsiveImages();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main-image')->singleFile();
        $this->addMediaCollection('content-images');
    }
}
