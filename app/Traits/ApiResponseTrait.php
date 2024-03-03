<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * Generic success response 
     */
    protected function success(string $message, array $data = [], int $status = 200) {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    /**
     * Generic failure response 
     */
    protected function failure(string $message, int $status = 422) {
        return response([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}