<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news() {
        return view('news.news', ['news' => News::getNews()]);
    }

    public function categories() {
        return view('news.newsCategory', ['categories' => News::$category]);
    }

    protected function categoryNews($id) {
        $news = [];

        foreach (News::$category as $item) {
            if ($item['name'] == $id) $id = $item['id'];
        }

        if (array_key_exists($id, News::$category)) {
            $name = News::$category[$id]['category'];
            foreach (News::getNews() as $item) {
                if ($item['categoryId'] == $id)
                    $news[] = $item;
            }
            return view('news.oneCategory', ['news' => $news, 'category' => $name]);
        } else
            return redirect(route('news.categories'));
    }

    public function newsOne($id)
    {
        if (array_key_exists($id, News::$news))
            return view('news.newsOne', ['news' => News::$news[$id]]);
        else
            return redirect(route('news.all'));

    }

}
