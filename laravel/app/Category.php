<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 * @property string category
 * @property string name
 */
class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['category', 'name'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }
    public static function rules() {
        return [
            'category' => 'required|max:20',
            'name' => 'required|max:20',
            'image' => 'mimes:jpeg,bmp,png|max:1000'

        ];
    }
    public static function attributeNames() {
        return [
            'category' => 'Название категории',
            'name' => 'Псевдоним категории для url',
            'image' => "Изображение"
        ];
    }
}
