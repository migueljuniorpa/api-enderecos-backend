<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param string $message
     * @param array  $data
     * @param int    $code
     *
     * @return JsonResponse
     */
    protected function success(string $message, array $data = [], int $code = 200): JsonResponse
    {
        return response()->json(
            [
                'status'  => 'success',
                'message' => $message,
                'data'    => $data
            ],
            $code
        );
    }
    
    /**
     * Return an error JSON response.
     *
     * @param string $message
     * @param array  $data
     * @param int    $code
     *
     * @return JsonResponse
     */
    protected function error(string $message, array $data = [], int $code = 500): JsonResponse
    {
        return response()->json(
            [
                'status'  => 'error',
                'message' => $message,
                'data'    => $data
            ],
            $code
        );
    }

}
