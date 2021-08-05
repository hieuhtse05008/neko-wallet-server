<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoinMarketsDataAPIRequest;
use App\Http\Requests\API\UpdateCoinMarketsDataAPIRequest;
use App\Models\CoinMarketsData;
use App\Repositories\CoinMarketsDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class CoinMarketsDataController
 * @package App\Http\Controllers\API
 */

class CoinMarketsDataAPIController extends APIController
{
    /** @var  CoinMarketsDataRepository */
    private $coinMarketsDataRepository;

    public function __construct(CoinMarketsDataRepository $coinMarketsDataRepo)
    {
        parent::__construct();
        $this->coinMarketsDataRepository = $coinMarketsDataRepo;
    }

    /**
     * Display a listing of the CoinMarketsData.
     * GET /api/v1/coin-markets-datas
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/coin-markets-datas",
     *      summary="Get a listing of the Coin Markets Data.",
     *      tags={"CoinMarketsData"},
     *      description="Get all Coin Markets Datas",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Coin Markets Data will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="coin_markets_datas",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/CoinMarketsDataTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [
            'include'=>$request->include
        ];
        $limit = $request->limit ?: 2000;
//        $limit = $request->limit;
//        $this->coinMarketsDataRepository->with($request->include);
        try {
            $coinMarketsDatas = $this->coinMarketsDataRepository->list($limit, $filter);

        }catch (\Exception $e){
            throw $e;
        }

        return $this->respondSuccess([
            "coin_markets_datas" => $coinMarketsDatas
        ]);
    }

    /**
     * Store a newly created CoinMarketsData in storage.
     * POST /api/v1/coin-markets-datas
     *
     * @param CreateCoinMarketsDataAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/coin-markets-datas",
     *      summary="Store a newly created Coin Markets Data in database",
     *      tags={"CoinMarketsData"},
     *      description="Store Coin Markets Data",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Coin Markets Data",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateCoinMarketsDataAPIRequest",
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
     *                  property="coin_markets_data",
     *                  ref="#/components/schemas/CoinMarketsDataTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateCoinMarketsDataAPIRequest $request)
    {
        $input = $request->validated();

        $coinMarketsData = $this->coinMarketsDataRepository->create($input);

        return $this->respondSuccess([
            "coin_markets_data" => $coinMarketsData
        ]);
    }

    /**
     * Display the specified CoinMarketsData.
     * GET /api/v1/coin-markets-datas/id
     *
     * @param CoinMarketsData $coinMarketsData
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/coin-markets-datas/{id}",
     *      summary="Display the specified CoinMarketsData",
     *      tags={"CoinMarketsData"},
     *      description="Get CoinMarketsData",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of CoinMarketsData",
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
     *                  property="coin_markets_data",
     *                  ref="#/components/schemas/CoinMarketsDataTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(CoinMarketsData $coinMarketsData)
    {
        /** @var CoinMarketsData $coinMarketsData */
        $coinMarketsData = $this->coinMarketsDataRepository->find($coinMarketsData->id);

        return $this->respondSuccess([
            "coin_markets_data" => $coinMarketsData
        ]);
    }

    /**
     * Update the specified CoinMarketsData in storage.
     * PUT /api/v1/coin-markets-datas/id
     *
     * @param CoinMarketsData $coinMarketsData
     * @param UpdateCoinMarketsDataAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/coin-markets-datas/{id}",
     *      summary="Update the specified CoinMarketsData in storage",
     *      tags={"CoinMarketsData"},
     *      description="Update CoinMarketsData",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of CoinMarketsData",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Coin Markets Data",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateCoinMarketsDataAPIRequest",
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
     *                  property="coin_markets_data",
     *                  ref="#/components/schemas/CoinMarketsDataTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(CoinMarketsData $coinMarketsData, UpdateCoinMarketsDataAPIRequest $request)
    {
        $input = $request->validated();

        $coinMarketsData = $this->coinMarketsDataRepository->update($input, $coinMarketsData->id);

        return $this->respondSuccess([
            "coin_markets_data" => $coinMarketsData
        ]);
    }

    /**
     * Remove the specified CoinMarketsData from database.
     * DELETE /api/v1/coin-markets-datas/id
     *
     * @param CoinMarketsData $coinMarketsData
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/coin-markets-datas/{id}",
     *      summary="Remove the specified CoinMarketsData from database",
     *      tags={"CoinMarketsData"},
     *      description="Delete CoinMarketsData",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of CoinMarketsData",
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
     *                  example="Coin Markets Data deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(CoinMarketsData $coinMarketsData)
    {
        $coinMarketsData->delete();

        return $this->respondSuccessWithMessage('Coin Markets Data deleted successfully');
    }
}
