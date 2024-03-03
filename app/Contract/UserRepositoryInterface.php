<?php

namespace App\Contract;

use App\Models\User;

interface UserRepositoryInterface 
{
    public function authenticate(array $attributes);
}