<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Contract\UserRepositoryInterface;
use App\Traits\ApiResponseTrait;

use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use ApiResponseTrait;

    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * Authenticate a user based on provided username and password
     */
    public function authenticate(Request $request) {
        try {
            $attributes = $request->only([
                'username',
                'password'
            ]);
            $validity = $this->repository->authenticate($attributes);

            if($validity) return $this->success('Successfully logged in.', $validity->toArray());
            else return $this->failure('Please enter correct login details.', 200);
        } catch(Exception $e) {
            return $this->failure($e->getMessage(), 500);
        }
    }
}
