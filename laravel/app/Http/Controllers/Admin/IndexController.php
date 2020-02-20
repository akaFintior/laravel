<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected function index() {
        return view('admin.admin');
    }

    public function test1()
    {
        return view('admin.test1');
    }

    public function test2()
    {
        return view('admin.test2');

    }
}
