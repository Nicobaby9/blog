<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Post;

class Category extends Model
{
    protected $guarded = [];

    public function posts() {
    	return $this->hasmany(Post::class);
    }
}
