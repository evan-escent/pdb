<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Calender_event extends Model
{
    protected $dates = ['start', 'end'];

    public function getId() {
    	return $this->id;
    }

    public function getTitle() {
    	return $this->title;
    }

    public function isAllDay() {
    	return (bool)$this->all_day;
    }

    public function getStart() {
    	return $this->start;
    }

    public function getEnd() {
    	return $this->end;
    }

    public function user() {
		return $this->belongsTo(User::class);
	}

	protected $table = 'calender_event';
}
