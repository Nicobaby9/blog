<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdviceMail extends Model
{
	use SoftDeletes;

    protected $guarded = [];
}
