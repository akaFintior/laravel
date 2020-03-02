<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = ['title', 'inform', 'isPrivate', 'category_id'];

    public  function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }
}
