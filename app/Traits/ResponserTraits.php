<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ResponserTraits
{
    public function responseSuccess($message = 'successful', $data = []): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_OK,
            'message' => $message,
            'data' => $data,
            'errors' => []
        ], Response::HTTP_OK);
    }

    public function responseCreated($message = 'successfully created' ,$data = []): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_CREATED,
            'message' => $message,
            'data' => $data,
            'errors' => []
        ], Response::HTTP_CREATED);
    }

    private function responseError($message = 'fatal error', $code = 500, $errors = []): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => [],
            'errors' => $errors
        ], $code);
    }

    public function responseMsgOnly($msg = 'success'): JsonResponse
    {
        return response()->json([
            'code'  => Response::HTTP_OK,
            'message' => $msg
        ]);
    }

    public function responseSuccessWithPaginate($message = 'successful', $data = []): JsonResponse
    {
        // $combine = $data->nextPageUrl() ? $data->nextPageUrl().'&limit='.$data->perPage() : null;

        return response()->json([
            'code'  => Response::HTTP_OK,
            'message' => $message,
            'data' => $data,
            'links' => [
                'total' => $data->total(),
                'perPage' => $data->perPage(),
                'currentPage' => $data->currentPage(),
                'pageName' => $data->getPageName(),
                'path' => $data->path(),
                'lastPage' => $data->lastPage(),
                'nextPageUrl' =>  $data->nextPageUrl(),
            ]
        ]);
    }
}
