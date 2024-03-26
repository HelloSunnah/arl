<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;


trait HttpResponse
{
    /**
     * Send Success response.
     *
     * @param string $message
     * @param array|object $data
     * @param int $status_code
     *
     * @return JsonResponse
     */
    protected function sendSuccess(string $message, array|object $data = [], int $status_code = 200): JsonResponse
    {
        $response = [
            "success" => true,
            'message' => $message,
            'api'     => [
                'endpoint' => Request::url(),
                'method'   => Request::method(),
            ],
            'data'    => $data,
        ];

        return response()->json($response, $status_code);
    }

    /**
     * Send Error response.
     *
     * @param string $message
     * @param array|object $data
     * @param int $status_code
     *
     * @return JsonResponse
     */
    protected function sendError(string $message, array|object $data = [], int $status_code = 500): JsonResponse
    {
        $response = [
            "success" => false,
            'message' => $message,
            'api'     => [
                'endpoint' => Request::url(),
                'method'   => Request::method(),
            ],
            'data'    => $data,
        ];

        return response()->json($response, $status_code);
    }
}