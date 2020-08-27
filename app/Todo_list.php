<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Todos;
use App\Todos_finish;

class Todo_list extends Model
{
	public function user() {
    	return $this->belongsTo(User::class);
    }

    public function todos() {
        return $this->hasMany(Todos::class);
    }

    public function todos_finish() {
        return $this->hasMany(Todos_finish::class);
    }

    protected $table = 'list';
    public $timestamps = false;
}
