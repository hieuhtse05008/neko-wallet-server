<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * @OA\Info(
 *    title="Neko wallet API",
 *    version="1.0.0",
 * )
 * This class should be parent class for other API controllers
 * Class APIController
 */
class APIController extends Controller
{
    protected $statusCode = 200;
    protected $user;

    public function __construct()
    {
        $this->user = auth('api')->user();
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondError($message, $data)
    {
        return $this->respond([
            'data' => $data,
            'message' => $message,
            'status' => false
        ]);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondErrorWithMessage($message)
    {
        return $this->respond([
            'message' => $message,
            'status' => false
        ]);
    }

    /**
     * @param $nameObject
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($nameObject)
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respond([
            'message' => "Không tìm thấy " . $nameObject,
            "status" => false
        ]);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondSuccessWithStatus($data)
    {
        return $this->respond([
            'data' => $data,
            'status' => true
        ]);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondSuccess($data)
    {
        if (empty($data["status"])) {
            $data["status"] = true;
        }
        return $this->respond($data);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondSuccessWithMessage($message)
    {
        return $this->respond([
            'message' => $message,
            "status" => true
        ]);
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    private function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

}
