<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoinAPIRequest;
use App\Http\Requests\API\UpdateCoinAPIRequest;
use App\Models\Coin;
use App\Repositories\CoinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class CoinController
 * @package App\Http\Controllers\API
 */

class CoinAPIController extends APIController
{
    /** @var  CoinRepository */
    private $coinRepository;

    public function __construct(CoinRepository $coinRepo)
    {
        parent::__construct();
        $this->coinRepository = $coinRepo;
    }

    /**
     * Display a listing of the Coin.
     * GET /api/v1/coins
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/coins",
     *      summary="Get a listing of the Coin.",
     *      tags={"Coin"},
     *      description="Get all Coins",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Coin will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="coins",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/CoinTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [
            'include'=>$request->include,
            'symbols' =>   $request->symbols,
            'last_market'=> $request->last_market,
        ];
        $limit = $request->limit ?: 20;
//        $limit = $request->limit;
        $this->coinRepository->with($request->include);
        dd($request->all());
        $coins = $this->coinRepository->list($limit, $filter);

        return $this->respondSuccess([
            "coins" => $coins
        ]);
    }

    /**
     * Store a newly created Coin in storage.
     * POST /api/v1/coins
     *
     * @param CreateCoinAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/coins",
     *      summary="Store a newly created Coin in database",
     *      tags={"Coin"},
     *      description="Store Coin",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Coin",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateCoinAPIRequest",
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
     *                  property="coin",
     *                  ref="#/components/schemas/CoinTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateCoinAPIRequest $request)
    {
        $input = $request->validated();

        $coin = $this->coinRepository->create($input);

        return $this->respondSuccess([
            "coin" => $coin
        ]);
    }

    /**
     * Display the specified Coin.
     * GET /api/v1/coins/id
     *
     * @param Coin $coin
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/coins/{id}",
     *      summary="Display the specified Coin",
     *      tags={"Coin"},
     *      description="Get Coin",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of Coin",
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
     *                  property="coin",
     *                  ref="#/components/schemas/CoinTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(Coin $coin)
    {
        /** @var Coin $coin */
        $coin = $this->coinRepository->find($coin->id);

        return $this->respondSuccess([
            "coin" => $coin
        ]);
    }

    /**
     * Update the specified Coin in storage.
     * PUT /api/v1/coins/id
     *
     * @param Coin $coin
     * @param UpdateCoinAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/coins/{id}",
     *      summary="Update the specified Coin in storage",
     *      tags={"Coin"},
     *      description="Update Coin",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Coin",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Coin",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateCoinAPIRequest",
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
     *                  property="coin",
     *                  ref="#/components/schemas/CoinTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(Coin $coin, UpdateCoinAPIRequest $request)
    {
        $input = $request->validated();

        $coin = $this->coinRepository->update($input, $coin->id);

        return $this->respondSuccess([
            "coin" => $coin
        ]);
    }

    /**
     * Remove the specified Coin from database.
     * DELETE /api/v1/coins/id
     *
     * @param Coin $coin
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/coins/{id}",
     *      summary="Remove the specified Coin from database",
     *      tags={"Coin"},
     *      description="Delete Coin",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Coin",
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
     *                  example="Coin deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(Coin $coin)
    {
        $coin->delete();

        return $this->respondSuccessWithMessage('Coin deleted successfully');
    }
}
