<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use App\User;
use DemeterChain\C;
use Illuminate\Http\Request;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.categories', [
            'categories' => Category::query()->select()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Category $category)
    {
        return view('admin.category.category', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Category();
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $cat->image = $url;
        }
        $this->validate($request, Category::rules(), [], Category::attributeNames());
        $cat->fill($request->all())->save();
        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно создана!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        return view('admin.category.editCategory', ['category' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Category::find($id);
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $cat->image = $url;
        }
        $this->validate($request, Category::rules(), [], Category::attributeNames());
        $cat->fill($request->all())->save();

        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cat = Category::find($id);
        if (count(News::all()->where('category_id', '=', $id)) > 0) {
            return redirect()->route('admin.categories.index')->with('alert', 'Невозможно удалить категорию, в которой есть новости!');
        }
        $cat->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно удалена!');
    }
}
