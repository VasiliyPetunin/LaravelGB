<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'text', 'isPrivate', 'category_id'];
}
