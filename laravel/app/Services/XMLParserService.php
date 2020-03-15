<?php


namespace App\Services;

use App\Category;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link) {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
        //  info($data);
        dump($data);
        $filename = sprintf('logs%s.txt', time() . rand(0,10000));
        \Storage::disk('publicLogs')->append($filename, date('c'). ' ' . $link);

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
    }
}
