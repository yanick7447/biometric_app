<?php

namespace App\Http\Traits;

class Response{
    public function success($data): array
    {
        return [
            'status' => 200,
            'success' => true,
            'data' => $data
        ];
    }

    public function created($data): array
    {
        return [
            'status' => 201,
            'success' => true,
            'data' => $data
        ];
    }

    public function IdNotFound(): array
    {
        return [
            'status' => 404,
            'success' => false,
            'message' => "Unknown ID",
        ];
    }

    public function error($statusCode = 500, $data = null): array
    {
        return [
            'status' => $statusCode,
            'success' => false,
            'message' => "An error occurred",
            'data' => $data,
        ];
    }

}
