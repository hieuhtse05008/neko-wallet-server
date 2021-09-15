<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCryptocurrencyInfoAPIRequest;
use App\Http\Requests\API\UpdateCryptocurrencyInfoAPIRequest;
use App\Models\CryptocurrencyInfo;
use App\Repositories\CryptocurrencyInfoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class CryptocurrencyInfoController
 * @package App\Http\Controllers\API
 */

class CryptocurrencyInfoAPIController extends APIController
{
    /** @var  CryptocurrencyInfoRepository */
    private $cryptocurrencyInfoRepository;

    public function __construct(CryptocurrencyInfoRepository $cryptocurrencyInfoRepo)
    {
        parent::__construct();
        $this->cryptocurrencyInfoRepository = $cryptocurrencyInfoRepo;
    }

    /**
     * Display a listing of the CryptocurrencyInfo.
     * GET /api/v1/cryptocurrency-infos
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/cryptocurrency-infos",
     *      summary="Get a listing of the Cryptocurrency Info.",
     *      tags={"CryptocurrencyInfo"},
     *      description="Get all Cryptocurrency Infos",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Cryptocurrency Info will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
     *          example="",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
     *          description="Use pagination when the limit parameter is greater than 0",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="status",
     *                  type="boolean",
     *              ),
     *              @OA\Property(
     *                  property="cryptocurrency_infos",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/CryptocurrencyInfoTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $cryptocurrencyInfos = $this->cryptocurrencyInfoRepository->list($limit, $filter);

        return $this->respondSuccess([
            "cryptocurrency_infos" => $cryptocurrencyInfos
        ]);
    }

    /**
     * Store a newly created CryptocurrencyInfo in storage.
     * POST /api/v1/cryptocurrency-infos
     *
     * @param CreateCryptocurrencyInfoAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/cryptocurrency-infos",
     *      summary="Store a newly created Cryptocurrency Info in database",
     *      tags={"CryptocurrencyInfo"},
     *      description="Store Cryptocurrency Info",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Cryptocurrency Info",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateCryptocurrencyInfoAPIRequest",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful created",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="status",
     *                  type="boolean",
     *              ),
     *              @OA\Property(
     *                  property="cryptocurrency_info",
     *                  ref="#/components/schemas/CryptocurrencyInfoTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateCryptocurrencyInfoAPIRequest $request)
    {
        $input = $request->validated();

        $cryptocurrencyInfo = $this->cryptocurrencyInfoRepository->create($input);

        return $this->respondSuccess([
            "cryptocurrency_info" => $cryptocurrencyInfo
        ]);
    }

    /**
     * Display the specified CryptocurrencyInfo.
     * GET /api/v1/cryptocurrency-infos/id
     *
     * @param CryptocurrencyInfo $cryptocurrencyInfo
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/cryptocurrency-infos/{id}",
     *      summary="Display the specified CryptocurrencyInfo",
     *      tags={"CryptocurrencyInfo"},
     *      description="Get CryptocurrencyInfo",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of CryptocurrencyInfo",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="status",
     *                  type="boolean",
     *              ),
     *              @OA\Property(
     *                  property="cryptocurrency_info",
     *                  ref="#/components/schemas/CryptocurrencyInfoTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(CryptocurrencyInfo $cryptocurrencyInfo)
    {
        /** @var CryptocurrencyInfo $cryptocurrencyInfo */
        $cryptocurrencyInfo = $this->cryptocurrencyInfoRepository->find($cryptocurrencyInfo->id);

        return $this->respondSuccess([
            "cryptocurrency_info" => $cryptocurrencyInfo
        ]);
    }

    /**
     * Update the specified CryptocurrencyInfo in storage.
     * PUT /api/v1/cryptocurrency-infos/id
     *
     * @param CryptocurrencyInfo $cryptocurrencyInfo
     * @param UpdateCryptocurrencyInfoAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/cryptocurrency-infos/{id}",
     *      summary="Update the specified CryptocurrencyInfo in storage",
     *      tags={"CryptocurrencyInfo"},
     *      description="Update CryptocurrencyInfo",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of CryptocurrencyInfo",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Cryptocurrency Info",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateCryptocurrencyInfoAPIRequest",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful updated",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean",
     *              ),
     *              @OA\Property(
     *                  property="cryptocurrency_info",
     *                  ref="#/components/schemas/CryptocurrencyInfoTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(CryptocurrencyInfo $cryptocurrencyInfo, UpdateCryptocurrencyInfoAPIRequest $request)
    {
        $input = $request->validated();

        $cryptocurrencyInfo = $this->cryptocurrencyInfoRepository->update($input, $cryptocurrencyInfo->id);

        return $this->respondSuccess([
            "cryptocurrency_info" => $cryptocurrencyInfo
        ]);
    }

    /**
     * Remove the specified CryptocurrencyInfo from database.
     * DELETE /api/v1/cryptocurrency-infos/id
     *
     * @param CryptocurrencyInfo $cryptocurrencyInfo
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/cryptocurrency-infos/{id}",
     *      summary="Remove the specified CryptocurrencyInfo from database",
     *      tags={"CryptocurrencyInfo"},
     *      description="Delete CryptocurrencyInfo",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of CryptocurrencyInfo",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful deleted",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="status",
     *                  type="boolean",
     *                  example="true",
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Cryptocurrency Info deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(CryptocurrencyInfo $cryptocurrencyInfo)
    {
        $cryptocurrencyInfo->delete();

        return $this->respondSuccessWithMessage('Cryptocurrency Info deleted successfully');
    }
}
