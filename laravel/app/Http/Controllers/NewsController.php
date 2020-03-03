<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function news()
    {

        $news = News::query()
            ->where('isPrivate', false)
            ->paginate(6);

        return view('news.news', ['news' => $news]);

    }

    public function categoryNews($id)
    {


        $cat = Category::query()->select(['id', 'category'])->where('name', $id)->get();

        $news = Category::query()->find($cat[0]->id)->news()->paginate(6);

        return view('news.oneCategory', ['news' => $news, 'category' => $cat[0]->category]);


    }

    public function categories()
    {
        return view('news.newsCategory', [
                'categories' => Category::all()
            ]
        );
    }

    public function newsOne(News $news)
    {
        return view('news.newsOne', ['news' => $news]);

    }
}
