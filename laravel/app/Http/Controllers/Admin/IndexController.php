<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return response()->json(DB::table('news')->get())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function addNews(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }
            $data = DB::table('news')->get();
            $id = DB::table('news')->max('id');
            $data[$id] = [
                'id' => $id + 1,
                'title' => $request->title,
                'category_id' => $request->categoryId,
                'inform' => $request->text,
                'image' => $url,
                'is_private' => isset($request->isPrivate)
            ];
            DB::table('news')->insert($data[$id]);


            return redirect()->route('admin.admin');
        }

        return view('admin.addNews', ['categories' => DB::table('categories')->get()]);
    }
}
