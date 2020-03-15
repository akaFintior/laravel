<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\News;
use App\Resource;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Services\XMLParserService;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService) {
        $rssLinks = Resource::all();
        foreach ($rssLinks as $link) {
//            $parserService->saveNews($link->link);
            NewsParsing::dispatch($link->link);
        }
        return redirect()->route('news.categories');
    }
}
