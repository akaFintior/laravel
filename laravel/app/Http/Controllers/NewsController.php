<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function news() {
        $news = DB::table('news')->get();
        return view('news.news', ['news' => $news]);
    }

    public function categories() {
        $categories = DB::table('categories')->get();
        return view('news.newsCategory', ['categories' => $categories]);
    }

    protected function categoryNews($id) {
        $news = [];
        $category = DB::table('categories')->find($id);
        if ($category) {
            $name = $category->name;
            foreach (DB::table('news')->get() as $item) {
                if ($item->category_id == $id)
                    $news[] = $item;
            }
            return view('news.oneCategory', ['news' => $news, 'category' => $name]);
        } else
            return redirect(route('news.categories'));
    }

    public function newsOne($id)
    {
        $news = DB::table('news')->find($id);

        if (empty($news)) {
            return redirect(route('news.all'));
        }

        return view('news.newsOne', ['news' => $news]);
    }

}
