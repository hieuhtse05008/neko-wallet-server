<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSwapAPIRequest;
use App\Http\Requests\API\UpdateSwapAPIRequest;
use App\Models\Swap;
use App\Repositories\SwapRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class SwapController
 * @package App\Http\Controllers\API
 */

class SwapAPIController extends APIController
{
    /** @var  SwapRepository */
    private $swapRepository;

    public function __construct(SwapRepository $swapRepo)
    {
        parent::__construct();
        $this->swapRepository = $swapRepo;
    }

    /**
     * Display a listing of the Swap.
     * GET /api/v1/swaps
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/swaps",
     *      summary="Get a listing of the Swap.",
     *      tags={"Swap"},
     *      description="Get all Swaps",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Swap will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="swaps",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/SwapTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $swaps = $this->swapRepository->list($limit, $filter);

        return $this->respondSuccess([
            "swaps" => $swaps
        ]);
    }

    public function swapAddress(Request $request){
        $api = new \App\Dex\BinanceAPI();

        $coin = $request->coin;
        $network = $request->network;

        return response()->json(['address' => $api->depositAddress($coin, $network)['address']]);
    }

    /**
     * Store a newly created Swap in storage.
     * POST /api/v1/swaps
     *
     * @param CreateSwapAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/swaps",
     *      summary="Store a newly created Swap in database",
     *      tags={"Swap"},
     *      description="Store Swap",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Swap",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateSwapAPIRequest",
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
     *                  property="swap",
     *                  ref="#/components/schemas/SwapTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateSwapAPIRequest $request)
    {
        $input = $request->validated();

        $swap = $this->swapRepository->create($input);

        return $this->respondSuccess([
            "swap" => $swap
        ]);
    }

    /**
     * Display the specified Swap.
     * GET /api/v1/swaps/id
     *
     * @param Swap $swap
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/swaps/{id}",
     *      summary="Display the specified Swap",
     *      tags={"Swap"},
     *      description="Get Swap",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of Swap",
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
     *                  property="swap",
     *                  ref="#/components/schemas/SwapTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(Swap $swap)
    {
        /** @var Swap $swap */
        $swap = $this->swapRepository->find($swap->id);

        return $this->respondSuccess([
            "swap" => $swap
        ]);
    }

    /**
     * Update the specified Swap in storage.
     * PUT /api/v1/swaps/id
     *
     * @param Swap $swap
     * @param UpdateSwapAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/swaps/{id}",
     *      summary="Update the specified Swap in storage",
     *      tags={"Swap"},
     *      description="Update Swap",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Swap",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Swap",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateSwapAPIRequest",
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
     *                  property="swap",
     *                  ref="#/components/schemas/SwapTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(Swap $swap, UpdateSwapAPIRequest $request)
    {
        $input = $request->validated();

        $swap = $this->swapRepository->update($input, $swap->id);

        return $this->respondSuccess([
            "swap" => $swap
        ]);
    }

    /**
     * Remove the specified Swap from database.
     * DELETE /api/v1/swaps/id
     *
     * @param Swap $swap
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/swaps/{id}",
     *      summary="Remove the specified Swap from database",
     *      tags={"Swap"},
     *      description="Delete Swap",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Swap",
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
     *                  example="Swap deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(Swap $swap)
    {
        $swap->delete();

        return $this->respondSuccessWithMessage('Swap deleted successfully');
    }
}
