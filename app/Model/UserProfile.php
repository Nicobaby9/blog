<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class UserProfile extends Model
{
    protected $guarded = [];

    public function getRouteKeyName() {
        return 'username';
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
