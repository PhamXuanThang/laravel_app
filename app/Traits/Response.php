<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait Response
{
    /**
     * @param mixed|null $data
     * @return JsonResponse
     */
    public function successResponse(mixed $data = null): JsonResponse
    {
        return response()->json([
            'status' => true,
            //'code' => ResponseAlias::HTTP_OK,
            'data' => $data,
        ], ResponseAlias::HTTP_OK);
    }

    /**
     * @param mixed|null $data
     * @return JsonResponse
     */
    public function errorResponse(mixed $data = null): JsonResponse
    {
        return response()->json([
            'status' => false,
            //'code' => ResponseAlias::HTTP_BAD_REQUEST,
            'data' => $data,
        ], ResponseAlias::HTTP_BAD_REQUEST);
    }


    /**
     * paginateDataResponse
     *
     * @param  mixed $data
     * @param null|array $options
     * @return JsonResponse
     */
    public function paginateDataResponse(mixed $data, null|array $options = []): JsonResponse
    {
        $responseData = [
            'data' => $data->items(),
            'totalRecord' => $data->total(),
            'perPage' => (int) $data->perPage(),
            'currentPage' => $data->currentPage(),
        ];

        if ($options) {
            $responseData = array_merge($responseData, $options);
        }

        return $this->successResponse($responseData);
    }

    /**
     * validateRequestErrorResponse
     *
     * @param mixed $data
     * @return JsonResponse
     */
    public function validateResponse(mixed $data): JsonResponse
    {
        return response()->json([
            'status' => false,
            'data' => $data,
        ], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
    }

}
