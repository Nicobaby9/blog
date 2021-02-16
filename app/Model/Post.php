<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\{Category, Comment, Tag, User};

class Post extends Model
{
	use SoftDeletes;

    protected $fillable = ['title', 'user_id', 'slug', 'category_id', 'content', 'image'];

    public function category() {
    	return $this->belongsTo(Category::class);
    }

    public function tags() {
    	return $this->belongsToMany(Tag::class)->withTimeStamps();
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function requestMainContent() {
        return $this->hasOne(RequestMainContent::class);
    }
}
