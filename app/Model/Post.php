<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable= 
    ["id","images","content","user_id","category_id"];

}

