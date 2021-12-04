<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getUserBySocId($user, string $socName) {
        $userInSystem = User::query()
            ->where('id_in_soc', $user['id'])
            ->where('type_auth', $socName)
            ->first();

        if (is_null($userInSystem)) {
            $userInSystem = new User();


            $userInSystem->fill([
                'name' => !empty($user['login']) ? $user['login'] : '',
                'email' => !empty($user['email']) ? $user['email'] : '',
                'password' => '',
                'id_in_soc' => !empty($user['id']) ? $user['id'] : '',
                'type_auth' => $socName,
                'email_verified_at' => now(),
                'avatar' => !empty($user['avatar_url']) ? $user['avatar_url'] : '',

            ]);
            $userInSystem->save();
        }

        return $userInSystem;
    }
}
