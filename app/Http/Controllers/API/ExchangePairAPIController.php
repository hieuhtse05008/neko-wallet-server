<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExchangePairAPIRequest;
use App\Http\Requests\API\UpdateExchangePairAPIRequest;
use App\Models\ExchangePair;
use App\Repositories\ExchangePairRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class ExchangePairController
 * @package App\Http\Controllers\API
 */

class ExchangePairAPIController extends APIController
{
    /** @var  ExchangePairRepository */
    private $exchangePairRepository;

    public function __construct(ExchangePairRepository $exchangePairRepo)
    {
        parent::__construct();
        $this->exchangePairRepository = $exchangePairRepo;
    }

    /**
     * Display a listing of the ExchangePair.
     * GET /api/v1/exchange-pairs
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/exchange-pairs",
     *      summary="Get a listing of the Exchange Pair.",
     *      tags={"ExchangePair"},
     *      description="Get all Exchange Pairs",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Exchange Pair will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="exchange_pairs",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/ExchangePairTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $exchangePairs = $this->exchangePairRepository->list($limit, $filter);

        return $this->respondSuccess([
            "exchange_pairs" => $exchangePairs
        ]);
    }

    /**
     * Store a newly created ExchangePair in storage.
     * POST /api/v1/exchange-pairs
     *
     * @param CreateExchangePairAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/exchange-pairs",
     *      summary="Store a newly created Exchange Pair in database",
     *      tags={"ExchangePair"},
     *      description="Store Exchange Pair",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Exchange Pair",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateExchangePairAPIRequest",
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
     *                  property="exchange_pair",
     *                  ref="#/components/schemas/ExchangePairTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateExchangePairAPIRequest $request)
    {
        $input = $request->validated();

        $exchangePair = $this->exchangePairRepository->create($input);

        return $this->respondSuccess([
            "exchange_pair" => $exchangePair
        ]);
    }

    /**
     * Display the specified ExchangePair.
     * GET /api/v1/exchange-pairs/id
     *
     * @param ExchangePair $exchangePair
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/exchange-pairs/{id}",
     *      summary="Display the specified ExchangePair",
     *      tags={"ExchangePair"},
     *      description="Get ExchangePair",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of ExchangePair",
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
     *                  property="exchange_pair",
     *                  ref="#/components/schemas/ExchangePairTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(ExchangePair $exchangePair)
    {
        /** @var ExchangePair $exchangePair */
        $exchangePair = $this->exchangePairRepository->find($exchangePair->id);

        return $this->respondSuccess([
            "exchange_pair" => $exchangePair
        ]);
    }

    /**
     * Update the specified ExchangePair in storage.
     * PUT /api/v1/exchange-pairs/id
     *
     * @param ExchangePair $exchangePair
     * @param UpdateExchangePairAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/exchange-pairs/{id}",
     *      summary="Update the specified ExchangePair in storage",
     *      tags={"ExchangePair"},
     *      description="Update ExchangePair",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of ExchangePair",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Exchange Pair",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateExchangePairAPIRequest",
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
     *                  property="exchange_pair",
     *                  ref="#/components/schemas/ExchangePairTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(ExchangePair $exchangePair, UpdateExchangePairAPIRequest $request)
    {
        $input = $request->validated();

        $exchangePair = $this->exchangePairRepository->update($input, $exchangePair->id);

        return $this->respondSuccess([
            "exchange_pair" => $exchangePair
        ]);
    }

    /**
     * Remove the specified ExchangePair from database.
     * DELETE /api/v1/exchange-pairs/id
     *
     * @param ExchangePair $exchangePair
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/exchange-pairs/{id}",
     *      summary="Remove the specified ExchangePair from database",
     *      tags={"ExchangePair"},
     *      description="Delete ExchangePair",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of ExchangePair",
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
     *                  example="Exchange Pair deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(ExchangePair $exchangePair)
    {
        $exchangePair->delete();

        return $this->respondSuccessWithMessage('Exchange Pair deleted successfully');
    }
}
