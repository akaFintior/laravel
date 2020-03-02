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

    public static function rules() {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:10|max:20',
            'inform' => 'required',
            'category_id' => "required|exists:{$tableNameCategory},id",
            'image' => 'mimes:jpeg,bmp,png|max:1000'

        ];
    }
    public static function attributeNames() {
        return [
            'title' => 'Заголовок новости',
            'inform' => 'Текст новости',
            'category_id' => "Категория новости",
            'image' => "Изображение"
        ];
    }
}
