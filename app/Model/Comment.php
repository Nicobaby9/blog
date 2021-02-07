<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\{Post, User};

class Comment extends Model
{
    protected $guarded = [];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function posts() {
    	return $this->morphMany(Post::class, 'commentable')->whereNull('parent_id')->withTimestamps();
    }

    public function replies() {
    	return $this->hasMany(Comment::class, 'parent_id');
    }
}
