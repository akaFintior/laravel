<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news = [
        'sport' => [
            [
                'id' => 1,
                'title' => 'Футбол',
                'text' => 'Новость про футбол'
            ],
            [
                'id' => 2,
                'title' => 'Баскетбол',
                'text' => 'Новость про баскетбол'
            ],
            [
                'id' => 3,
                'title' => 'Волейбол',
                'text' => 'Новость про волейбол'
            ]
        ],
        'politics' => [
            [
                'id' => 4,
                'title' => 'Внешняя политика',
                'text' => 'Тут какая-то новость о внешней политике'
            ],
            [
                'id' => 5,
                'title' => 'Внутренняя политика',
                'text' => 'Тут какая-то новость о внутренней политике'
            ],
        ],
        'music' => [
            [
                'id' => 6,
                'title' => 'Новости поп-музыки',
                'text' => 'Новости о новых появившихся исполнителях поп-музыки'
            ],
            [
                'id' => 7,
                'title' => 'Новости рок-музыки',
                'text' => 'Новости о новых появившихся исполнителях рок-музыки'
            ],
            [
                'id' => 8,
                'title' => 'Новости хип-хоп музыки',
                'text' => 'Новости о новых появившихся исполнителях хип-хоп музыки'
            ],
            [
                'id' => 9,
                'title' => 'Топ недели',
                'text' => 'Популярные исполнители этой недели'
            ],
        ]
    ];
    private $categories = [];
    private $categoryNews = [];

    protected function categories() {
        foreach ($this->news as $category => $news) {
            $categories[] = $category;
        }
        return view('news', ['categories' => $categories]);
    }

    protected function categoryNews($category) {
        foreach ($this->news as $cat => $news) {
            if ($cat == $category) {
                $categoryNews = $news;
            }
        }
        return view('newsCategory', ['news' => $categoryNews, 'category' => $category]);
    }

    protected function newsOne($category, $id) {
        $news = $this->getNewsId($category, $id);
        return view('newsOne', ['news' => $news]);
    }

    private function getNewsId($category, $id) {
        foreach ($this->news as $cat => $news) {
            if ($cat == $category) {
                foreach ( $news as $index => $newsOne) {
                    if ($newsOne['id'] == $id) {
                        return $newsOne;
                    }
                }
            }
        }
    }
}
