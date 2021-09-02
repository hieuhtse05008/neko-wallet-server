<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHistoricalPriceAPIRequest;
use App\Http\Requests\API\UpdateHistoricalPriceAPIRequest;
use App\Repositories\HistoricalPriceRepository;
use Illuminate\Http\Request;

/**
 * Class HistoricalPriceController
 * @package App\Http\Controllers\API
 */
class HistoricalPriceAPIController extends APIController
{
    /** @var  HistoricalPriceRepository */
    private $historicalPriceRepository;

    public function __construct(HistoricalPriceRepository $historicalPriceRepo)
    {
        parent::__construct();
        $this->historicalPriceRepository = $historicalPriceRepo;
    }

    /**
     * Get the latest of cryptocurrencies.
     * GET /api/v1/cryptocurrencies/prices/latest
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/historical-prices",
     *      summary="Get a listing of the Historical Price.",
     *      tags={"HistoricalPrice"},
     *      description="Get all Historical Prices",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Historical Price will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="historical_prices",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/HistoricalPriceTransformer"),
     *              ),
     *          ),
     *      ),
     * )
     */

    public function latest(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $cryptocurrencies = $this->historicalPriceRepository->latest($limit, $filter);

        return $this->respondSuccess([
            "cryptocurrencies" => $cryptocurrencies->toArray()
        ]);
    }
}
