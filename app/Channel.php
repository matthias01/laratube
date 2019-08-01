<?php

namespace Laratube;



use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channel extends Model implements HasMedia
{

    use HasMediaTrait;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function registerMediaConversions(?Media $media = null)
    {
        // converts media to specific sizes
        $this->addMediaConversion('thumb')
            ->height(100)
            ->width(100);
    }

    //check if channel is editable i.e by the authorized user
    public function editable(){
        if (! auth()->check())
            return false;

        return $this->user_id === auth()->user()->id;
    }
    //check if channel has an image
    public function image()
    {
        if ($this->media->first()) {
            return $this->media->first()->getFullUrl('thumb');
        }
        return null;
    }

    //
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
