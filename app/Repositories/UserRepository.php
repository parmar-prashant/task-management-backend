<?php

namespace App\Repositories;

use App\Contract\UserRepositoryInterface;
use App\Models\User;

use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface 
{
    public function authenticate(array $attributes) {
        $user = User::where('email', $attributes['username'])
        ->where('password', $attributes['password'])->first();
        return $user;
    }
}