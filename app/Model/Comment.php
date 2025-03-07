<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable= 
    ["id","images","comment","user_id","post_id"];
}
