<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCryptocurrencyCategoryAPIRequest;
use App\Http\Requests\API\UpdateCryptocurrencyCategoryAPIRequest;
use App\Models\CryptocurrencyCategory;
use App\Repositories\CryptocurrencyCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class CryptocurrencyCategoryController
 * @package App\Http\Controllers\API
 */

class CryptocurrencyCategoryAPIController extends APIController
{
    /** @var  CryptocurrencyCategoryRepository */
    private $cryptocurrencyCategoryRepository;

    public function __construct(CryptocurrencyCategoryRepository $cryptocurrencyCategoryRepo)
    {
        parent::__construct();
        $this->cryptocurrencyCategoryRepository = $cryptocurrencyCategoryRepo;
    }

    /**
     * Display a listing of the CryptocurrencyCategory.
     * GET /api/v1/cryptocurrency-categories
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/cryptocurrency-categories",
     *      summary="Get a listing of the Cryptocurrency Category.",
     *      tags={"CryptocurrencyCategory"},
     *      description="Get all Cryptocurrency Categories",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Cryptocurrency Category will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="cryptocurrency_categories",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/CryptocurrencyCategoryTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $cryptocurrencyCategories = $this->cryptocurrencyCategoryRepository->list($limit, $filter);

        return $this->respondSuccess([
            "cryptocurrency_categories" => $cryptocurrencyCategories
        ]);
    }

    /**
     * Store a newly created CryptocurrencyCategory in storage.
     * POST /api/v1/cryptocurrency-categories
     *
     * @param CreateCryptocurrencyCategoryAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/cryptocurrency-categories",
     *      summary="Store a newly created Cryptocurrency Category in database",
     *      tags={"CryptocurrencyCategory"},
     *      description="Store Cryptocurrency Category",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Cryptocurrency Category",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateCryptocurrencyCategoryAPIRequest",
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
     *                  property="cryptocurrency_category",
     *                  ref="#/components/schemas/CryptocurrencyCategoryTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateCryptocurrencyCategoryAPIRequest $request)
    {
        $input = $request->validated();

        $cryptocurrencyCategory = $this->cryptocurrencyCategoryRepository->create($input);

        return $this->respondSuccess([
            "cryptocurrency_category" => $cryptocurrencyCategory
        ]);
    }

    /**
     * Display the specified CryptocurrencyCategory.
     * GET /api/v1/cryptocurrency-categories/id
     *
     * @param CryptocurrencyCategory $cryptocurrencyCategory
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/cryptocurrency-categories/{id}",
     *      summary="Display the specified CryptocurrencyCategory",
     *      tags={"CryptocurrencyCategory"},
     *      description="Get CryptocurrencyCategory",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of CryptocurrencyCategory",
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
     *                  property="cryptocurrency_category",
     *                  ref="#/components/schemas/CryptocurrencyCategoryTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(CryptocurrencyCategory $cryptocurrencyCategory)
    {
        /** @var CryptocurrencyCategory $cryptocurrencyCategory */
        $cryptocurrencyCategory = $this->cryptocurrencyCategoryRepository->find($cryptocurrencyCategory->id);

        return $this->respondSuccess([
            "cryptocurrency_category" => $cryptocurrencyCategory
        ]);
    }

    /**
     * Update the specified CryptocurrencyCategory in storage.
     * PUT /api/v1/cryptocurrency-categories/id
     *
     * @param CryptocurrencyCategory $cryptocurrencyCategory
     * @param UpdateCryptocurrencyCategoryAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/cryptocurrency-categories/{id}",
     *      summary="Update the specified CryptocurrencyCategory in storage",
     *      tags={"CryptocurrencyCategory"},
     *      description="Update CryptocurrencyCategory",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of CryptocurrencyCategory",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Cryptocurrency Category",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateCryptocurrencyCategoryAPIRequest",
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
     *                  property="cryptocurrency_category",
     *                  ref="#/components/schemas/CryptocurrencyCategoryTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(CryptocurrencyCategory $cryptocurrencyCategory, UpdateCryptocurrencyCategoryAPIRequest $request)
    {
        $input = $request->validated();

        $cryptocurrencyCategory = $this->cryptocurrencyCategoryRepository->update($input, $cryptocurrencyCategory->id);

        return $this->respondSuccess([
            "cryptocurrency_category" => $cryptocurrencyCategory
        ]);
    }

    /**
     * Remove the specified CryptocurrencyCategory from database.
     * DELETE /api/v1/cryptocurrency-categories/id
     *
     * @param CryptocurrencyCategory $cryptocurrencyCategory
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/cryptocurrency-categories/{id}",
     *      summary="Remove the specified CryptocurrencyCategory from database",
     *      tags={"CryptocurrencyCategory"},
     *      description="Delete CryptocurrencyCategory",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of CryptocurrencyCategory",
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
     *                  example="Cryptocurrency Category deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(CryptocurrencyCategory $cryptocurrencyCategory)
    {
        $cryptocurrencyCategory->delete();

        return $this->respondSuccessWithMessage('Cryptocurrency Category deleted successfully');
    }
}
