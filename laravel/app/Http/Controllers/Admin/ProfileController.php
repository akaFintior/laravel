<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request) {
        $user = Auth::user();

        $errors = [];
        if ($request->isMethod('post')) {
            $this->validate($request, $this->ValidateRules(), [], $this->attributeNames());
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);
                $user->save();
                //return redirect()->route('admin.updateProfile')->with('success', 'Пароль успешно изменен!');
                $request->session()->flash('success', 'Данные пользователя успешно изменены');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('updateProfile')->withErrors($errors);
        }

        return view('admin.profile', [
            'user' => $user
        ]);
    }
    public function adminConf(Request $request, User $user) {
        // главному администратору и себе права менять нельзя
        if ($request->isMethod('post')) {
            $user = User::find($request->route('id'));
            if (!$user->is_admin) {
                $user->is_admin = 1;
            } else {
                $user->is_admin =0;
            }
            $user->save();
            redirect()->route('admin.adminConf')->with('success', 'Права изменены');
        }
        return view('admin.users', ['users' => User::all() ]);
    }

    protected function ValidateRules() {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3'
        ];
    }

    protected function attributeNames() {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}
