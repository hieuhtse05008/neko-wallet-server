<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExchangeGuideAPIRequest;
use App\Http\Requests\API\UpdateExchangeGuideAPIRequest;
use App\Models\ExchangeGuide;
use App\Repositories\ExchangeGuideRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class ExchangeGuideController
 * @package App\Http\Controllers\API
 */

class ExchangeGuideAPIController extends APIController
{
    /** @var  ExchangeGuideRepository */
    private $exchangeGuideRepository;

    public function __construct(ExchangeGuideRepository $exchangeGuideRepo)
    {
        parent::__construct();
        $this->exchangeGuideRepository = $exchangeGuideRepo;
    }

    /**
     * Display a listing of the ExchangeGuide.
     * GET /api/v1/exchange-guides
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/exchange-guides",
     *      summary="Get a listing of the Exchange Guide.",
     *      tags={"ExchangeGuide"},
     *      description="Get all Exchange Guides",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Exchange Guide will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="exchange_guides",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/ExchangeGuideTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $exchangeGuides = $this->exchangeGuideRepository->list($limit, $filter);

        return $this->respondSuccess([
            "exchange_guides" => $exchangeGuides
        ]);
    }

    /**
     * Store a newly created ExchangeGuide in storage.
     * POST /api/v1/exchange-guides
     *
     * @param CreateExchangeGuideAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/exchange-guides",
     *      summary="Store a newly created Exchange Guide in database",
     *      tags={"ExchangeGuide"},
     *      description="Store Exchange Guide",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Exchange Guide",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateExchangeGuideAPIRequest",
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
     *                  property="exchange_guide",
     *                  ref="#/components/schemas/ExchangeGuideTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateExchangeGuideAPIRequest $request)
    {
        $input = $request->validated();

        $exchangeGuide = $this->exchangeGuideRepository->create($input);

        return $this->respondSuccess([
            "exchange_guide" => $exchangeGuide
        ]);
    }

    /**
     * Display the specified ExchangeGuide.
     * GET /api/v1/exchange-guides/id
     *
     * @param ExchangeGuide $exchangeGuide
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/exchange-guides/{id}",
     *      summary="Display the specified ExchangeGuide",
     *      tags={"ExchangeGuide"},
     *      description="Get ExchangeGuide",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of ExchangeGuide",
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
     *                  property="exchange_guide",
     *                  ref="#/components/schemas/ExchangeGuideTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(ExchangeGuide $exchangeGuide)
    {
        /** @var ExchangeGuide $exchangeGuide */
        $exchangeGuide = $this->exchangeGuideRepository->find($exchangeGuide->id);

        return $this->respondSuccess([
            "exchange_guide" => $exchangeGuide
        ]);
    }

    /**
     * Update the specified ExchangeGuide in storage.
     * PUT /api/v1/exchange-guides/id
     *
     * @param ExchangeGuide $exchangeGuide
     * @param UpdateExchangeGuideAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/exchange-guides/{id}",
     *      summary="Update the specified ExchangeGuide in storage",
     *      tags={"ExchangeGuide"},
     *      description="Update ExchangeGuide",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of ExchangeGuide",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Exchange Guide",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateExchangeGuideAPIRequest",
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
     *                  property="exchange_guide",
     *                  ref="#/components/schemas/ExchangeGuideTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(ExchangeGuide $exchangeGuide, UpdateExchangeGuideAPIRequest $request)
    {
        $input = $request->validated();

        $exchangeGuide = $this->exchangeGuideRepository->update($input, $exchangeGuide->id);

        return $this->respondSuccess([
            "exchange_guide" => $exchangeGuide
        ]);
    }

    /**
     * Remove the specified ExchangeGuide from database.
     * DELETE /api/v1/exchange-guides/id
     *
     * @param ExchangeGuide $exchangeGuide
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/exchange-guides/{id}",
     *      summary="Remove the specified ExchangeGuide from database",
     *      tags={"ExchangeGuide"},
     *      description="Delete ExchangeGuide",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of ExchangeGuide",
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
     *                  example="Exchange Guide deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(ExchangeGuide $exchangeGuide)
    {
        $exchangeGuide->delete();

        return $this->respondSuccessWithMessage('Exchange Guide deleted successfully');
    }
}
