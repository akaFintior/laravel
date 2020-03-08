<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index() {
        $xml = XmlParser::load('https://lenta.ru/rss/articles/russia');
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
        $cat = new Category();
        $cat->fill([
            'category' => $data['title'],
            'name' => substr($data['link'], 8, 5),
            'image' => $data['image'],
        ]);
        $cat->save();
        foreach ($data['news'] as $news) {
            $lentaNews = new News();
            $lentaNews->fill([
                'title' => $news['title'],
                'inform' => $news['description'],
                'category_id' => $cat->id
            ]);
            $lentaNews->save();
        }
        return redirect()->route('news.categories');
    }
}
