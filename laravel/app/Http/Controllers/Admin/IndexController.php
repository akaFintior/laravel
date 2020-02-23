<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    protected function index() {
        return view('admin.admin');
    }

    public function test1(Request $request) {
        $content = view('admin.test1')->render();
        return response($content)
            ->header('Content-type', 'application/txt')
            ->header('Content-Length', mb_strlen($content))
            ->header('Content-Disposition', 'attachment; filename = "downloaded.txt"');

    }

    public function test2() {
        return response()->json(News::$news)
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function addNews(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            // здесь сохраняем в файл с названием полученным из title + .json
            Storage::disk('local')->put($request->get('title') . '.json', json_encode($request->except('_token')), JSON_UNESCAPED_UNICODE);
            return redirect()->route('admin.admin');
        }

        return view('admin.addNews', ['categories' => News::$category]);
    }
}
