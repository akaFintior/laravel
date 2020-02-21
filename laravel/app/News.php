<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    public static $news = [
        '1' => [
            'id' => 1,
            'title' => 'Футбол',
            'text' => 'Новость про футбол',
            'categoryId' => 1,
            'isPrivate' => false
        ],
        '2' => [
            'id' => 2,
            'title' => 'Баскетбол',
            'text' => 'Новость про баскетбол',
            'categoryId' => 1,
            'isPrivate' => false
        ],
        '3' => [
            'id' => 3,
            'title' => 'Волейбол',
            'text' => 'Новость про волейбол',
            'categoryId' => 1,
            'isPrivate' => false
        ],
        '4' => [
            'id' => 4,
            'title' => 'Внешняя политика',
            'text' => 'Тут какая-то новость о внешней политике',
            'categoryId' => 2,
            'isPrivate' => false
        ],
        '5' => [
            'id' => 5,
            'title' => 'Внутренняя политика',
            'text' => 'Тут какая-то новость о внутренней политике',
            'categoryId' => 2,
            'isPrivate' => false
        ],
        '6' => [
            'id' => 6,
            'title' => 'Новости поп-музыки',
            'text' => 'Новости о новых появившихся исполнителях поп-музыки',
            'categoryId' => 3,
            'isPrivate' => false
        ],
        '7' => [
            'id' => 7,
            'title' => 'Новости рок-музыки',
            'text' => 'Новости о новых появившихся исполнителях рок-музыки',
            'categoryId' => 3,
            'isPrivate' => false
        ],
        '8' => [
            'id' => 8,
            'title' => 'Новости хип-хоп музыки',
            'text' => 'Новости о новых появившихся исполнителях хип-хоп музыки',
            'categoryId' => 3,
            'isPrivate' => false
        ],
        '9' => [
            'id' => 9,
            'title' => 'Топ недели',
            'text' => 'Популярные исполнители этой недели',
            'categoryId' => 3,
            'isPrivate' => false
        ]
    ];
    public static $category = [
        '1' => [
            'id' => 1,
            'category' => 'Спорт',
            'name' => 'sport'
        ],
        '2' => [
            'id' => 2,
            'category' => 'Политика',
            'name' => 'politics'
        ],
        '3' => [
            'id' => 3,
            'category' => 'Музыка',
            'name' => 'music'
        ],
    ];

    public static function getNews()
    {
        // проверяем все файлы в Storage и достаём только те, что с приставкой .json
        $files = Storage::files('/');
        $news = static::$news;
        foreach ($files as $file) {
            if (strpos($file, '.json')) {
                // StdObject приобразовываем к массиву
                $data = array_map(function ($obj) {
                    return (array)$obj;
                }, array(json_decode(Storage::get($file))));
                // добавляем отсутствующие поля в новости
                if (!array_key_exists('isPrivate', $data))
                    $data[0]['isPrivate'] = false;
                $data[0]['id'] = count($news) + 1;
                $news[] = $data[0];
            }
        }
        return $news;
    }
}
