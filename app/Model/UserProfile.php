<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\User;

class UserProfile extends Model
{
	use SoftDeletes;
	
    protected $guarded = [];

    public function getRouteKeyName() {
        return 'username';
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}