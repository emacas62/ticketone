<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventi extends Model
{
    protected $fillable = [
        'title','price','description', 'date', 'cover_url', 'address',
        'lat','lng', 'views_count', 'comments_count', 'likes_count'
    ];
}
