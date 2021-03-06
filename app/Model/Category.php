<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Post;

class Category extends Model
{
    protected $guarded = [];

    public function posts() {
    	return $this->hasMany(Post::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
