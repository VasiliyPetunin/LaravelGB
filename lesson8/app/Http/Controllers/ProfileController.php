<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request) {
            $errors = [];
            $user = Auth::user();

            if ($request->isMethod('post')) {

                $this->validate($request, $this->validateRules(), [], $this->attributeNames());

                if (Hash::check($request->post('password'), $user->password)) {
                    $user->fill([
                        'name' => $request->post('name'),
                        'password' => Hash::make($request->post('newPassword')),
                        'email' => $request->post('email')
                    ])->save();
                    return redirect()->route('profileUpdated');
                } else {
                    $errors['password'] = 'Неверно введен текущий пароль';
                    return view('users.incorrectPassword')->with('errors', $errors);
                }

            }

            return view('users.profile', [
                'user' => $user
            ]);
        }

        protected function validateRules()
        {
            return [
                'name' => 'required|string|max:15',
                'email' => 'required|email|unique:users,email,' . Auth::id(),
                'password' => 'required',
                'newPassword' => 'required|string|min:3',
                'is_admin' => 'boolean'
            ];
        }

        protected function attributeNames()
        {
            return [
                'newPassword' => 'Новый пароль'
            ];
        }
}
