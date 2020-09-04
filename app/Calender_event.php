<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Calender_event extends Model
{
    protected $fillable = ['title', 'start', 'end'];

    public function user() {
		return $this->belongsTo(User::class);
	}

	protected $table = 'calender_event';
}
