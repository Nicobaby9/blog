<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\{Category, User};

class Post extends Model
{
    protected $fillable = ['title', 'category_id', 'content', 'image'];

    public function category() {
    	return $this->belongsTo(Category::class);
    }
}
