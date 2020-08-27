<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Todo_list;

class Todos_finish extends Model
{
    public function todo_list() {
    	return $this->belongsTo(Todo_list::class);
    }

    protected $table = 'todos_finish';
    public $timestamps = false;
}
