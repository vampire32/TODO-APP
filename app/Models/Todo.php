<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    public $fillable=['title','content','user_id'];
    public $table='todos';


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

}
