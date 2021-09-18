<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCryptocurrencyAPIRequest;
use App\Http\Requests\API\UpdateCryptocurrencyAPIRequest;
use App\Models\Cryptocurrency;
use App\Repositories\CryptocurrencyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class CryptocurrencyController
 * @package App\Http\Controllers\API
 */

class CryptocurrencyAPIController extends APIController
{
    /** @var  CryptocurrencyRepository */
    private $cryptocurrencyRepository;

    public function __construct(CryptocurrencyRepository $cryptocurrencyRepo)
    {
        parent::__construct();
        $this->cryptocurrencyRepository = $cryptocurrencyRepo;
    }

    /**
     * Display a listing of the Cryptocurrency.
     * GET /api/v1/cryptocurrencies
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/cryptocurrencies",
     *      summary="Get a listing of the Cryptocurrency.",
     *      tags={"Cryptocurrency"},
     *      description="Get all Cryptocurrencies",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Cryptocurrency will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="cryptocurrencies",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/CryptocurrencyTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [
            'cryptocurrency'=>[
                'cryptocurrency_info'=> $request->cryptocurrency_info,
                'from_rank'=> $request->from_rank,
            ],
            'category'=> [
                'category_ids'=> $request->category_ids,
            ],
        ];
        $limit = $request->limit;
        $cryptocurrencies = $this->cryptocurrencyRepository->list($limit, $filter);

        return $this->respondSuccess([
            "cryptocurrencies" => $cryptocurrencies
        ]);
    }

    /**
     * Display the specified Cryptocurrency.
     * GET /api/v1/cryptocurrencies/id
     *
     * @param Cryptocurrency $cryptocurrency
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/cryptocurrencies/{id}",
     *      summary="Display the specified Cryptocurrency",
     *      tags={"Cryptocurrency"},
     *      description="Get Cryptocurrency",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of Cryptocurrency",
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
     *                  property="cryptocurrency",
     *                  ref="#/components/schemas/CryptocurrencyTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(Cryptocurrency $cryptocurrency)
    {
        /** @var Cryptocurrency $cryptocurrency */
        $cryptocurrency = $this->cryptocurrencyRepository->find($cryptocurrency->id);

        return $this->respondSuccess([
            "cryptocurrency" => $cryptocurrency
        ]);
    }
}
