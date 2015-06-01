<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    public function findByUserNameOrCreate($provider,$userData)
    {
        $user = User::whereRaw('provider_id = ? and provider = ?', [$userData->id,$provider])->first();
        if(!$user) {
            $user = User::create([
                'provider'  =>  $provider,
                'provider_id' => $userData->id,
                'name' => $userData->name,
                'username' => $userData->nickname,
                'email' => $userData->email,
                'avatar' => $userData->avatar,
                'active' => 1,
            ]);
            \Flash::message('New user created!');
        }

        $this->checkIfUserNeedsUpdating($userData, $user);
        return $user;
    }

    public function checkIfUserNeedsUpdating($userData, $user)
    {

        $socialData = [
            'avatar' => $userData->avatar,
            'email' => $userData->email,
            'name' => $userData->name,
            'username' => $userData->nickname,
        ];
        $dbData = [
            'avatar' => $user->avatar,
            'email' => $user->email,
            'name' => $user->name,
            'username' => $user->username,
        ];

        if (!empty(array_diff($socialData, $dbData)))
        {
            $user->avatar = $userData->avatar;
            $user->email = $userData->email;
            $user->name = $userData->name;
            $user->username = $userData->nickname;
            $user->save();
            \Flash::message('User updated!');
        }
    }
}