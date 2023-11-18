<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Channel;
use Carbon\Carbon;
use App\Models\Like;
use App\Models\Dislike;
use App\Models\Comment;
class Video extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getRouteKeyName()
    {

        return 'uid';
    }
    public function getThumbnailAttribute()
    {
        if($this->thumbnail_image)
        {
            return '/videos/'.$this->uid.'/'.$this->thumbnail_image;
        }
        else{
            return '/videos/default.png';
        }
        
    }
    public function channel()
    {

        return $this->belongsTo(Channel::class);
    }
    public function getUploadedDateAttribute()
    {
        $current_date = new Carbon($this->created_at);
        return $current_date->toFormattedDateString();
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }
    public function doesUserLikedVideo()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
    public function doesUserDislikeVideo()
    {
        return $this->dislikes()->where('user_id',auth()->id())->exists();    
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('reply_id');
    }
    public function AllCommentsCount()
    {
        return  $this->hasMany(Comment::class)->count();
    }
}
