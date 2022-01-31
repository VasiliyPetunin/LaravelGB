<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        return view('admin.users', [
            'users' => User::query()->paginate(5)
        ]);
    }

    public function update(Request $request, User $user) {

        if ($request->isMethod('put')) {

            $request->validate($user->rules($user), $user->messages(), $user->attributeName());

            $user->fill([
                'name' => $request->get('name'),
                'password' => Hash::make($request->get('newPassword')),
                'email' => $request->get('email')
            ])->save();

            return redirect()->route('admin.profileUpdated');

        }

        return view('admin.profile', [
            'user' => $user
        ]);
    }

    public function destroy(User $user) {
        $user->delete();
        return view('admin.userDeleted');
    }

    public function changeAdminRights(User $user) {

        if($user->id === Auth::id()) {
            return redirect()->route('admin.youAreAdmin');
        }

        $user->fill([
            'is_admin' => !((bool)$user->is_admin)
        ])->save();

        return redirect()->route('admin.profileUpdated');
    }
}
