<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Todo_list;

class Todos extends Model
{
    public function todo_list() {
    	return $this->belongsTo(Todo_list::class);
    }
}
