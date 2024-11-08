<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'title',
        'description',
        'image',
        'name',
        'user_id',
        'usertype',
        'post_status'
    ];
}
