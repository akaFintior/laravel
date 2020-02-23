<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function contact(Request $request) {
        if ($request->isMethod('post')) {
            $request->flash();
            return redirect(route('index', ['message' => 'Сообщение получено! С вами свяжутся в близжайшее время!']));
        }

        return view('contact');
    }
}
