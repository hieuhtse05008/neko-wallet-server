<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTokenAPIRequest;
use App\Http\Requests\API\UpdateTokenAPIRequest;
use App\Models\TokenPrice;
use App\Repositories\TokenPriceRepository;
use Brick\Math\BigDecimal;
use Brick\Math\BigInteger;
use Brick\Math\RoundingMode;
use Illuminate\Http\Request;

/**
 * Class TokenController
 * @package App\Http\Controllers\API
 */
class TokenAPIController extends APIController
{
    /** @var  TokenPriceRepository */
    private $tokenPriceRepository;

    public function __construct(TokenPriceRepository $tokenRepo)
    {
        parent::__construct();
        $this->tokenPriceRepository = $tokenRepo;
    }

    /**
     * Display a listing of the TokenPrice.
     * GET /api/v1/tokens
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/tokens",
     *      summary="Get a listing of the TokenPrice.",
     *      tags={"TokenPrice"},
     *      description="Get all Tokens",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the TokenPrice will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="tokens",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/TokenPriceTransformer"),
     *              ),
     *          ),
     *      ),
     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $tokens = $this->tokenPriceRepository->list($limit, $filter);

        return $this->respondSuccess([
            "tokens" => $tokens
        ]);
    }

    /**
     * Store a newly created TokenPrice in storage.
     * POST /api/v1/tokens
     *
     * @param CreateTokenAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/tokens",
     *      summary="Store a newly created TokenPrice in database",
     *      tags={"TokenPrice"},
     *      description="Store TokenPrice",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of TokenPrice",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateTokenAPIRequest",
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
     *                  property="token",
     *                  ref="#/components/schemas/TokenPriceTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateTokenAPIRequest $request)
    {
        $input = $request->validated();

        $token = $this->tokenPriceRepository->create($input);

        return $this->respondSuccess([
            "token" => $token
        ]);
    }

    /**
     * Display the specified TokenPrice.
     * GET /api/v1/tokens/id
     *
     * @param TokenPrice $token
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/tokens/{id}",
     *      summary="Display the specified TokenPrice",
     *      tags={"TokenPrice"},
     *      description="Get TokenPrice",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of TokenPrice",
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
     *                  property="token",
     *                  ref="#/components/schemas/TokenPriceTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(TokenPrice $token)
    {
        /** @var TokenPrice $token */
        $token = $this->tokenPriceRepository->find($token->id);

        return $this->respondSuccess([
            "token" => $token
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function swapPreview(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $bridge = $request->bridge ?: 'USDT';
        $preview = $this->tokenPriceRepository->swapPreview($from, $to, $bridge);
        return $this->respondSuccess([
            'preview'=>$preview
        ]);

    }

    /**
     * Update the specified TokenPrice in storage.
     * PUT /api/v1/tokens/id
     *
     * @param TokenPrice $token
     * @param UpdateTokenAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/tokens/{id}",
     *      summary="Update the specified TokenPrice in storage",
     *      tags={"TokenPrice"},
     *      description="Update TokenPrice",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of TokenPrice",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of TokenPrice",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateTokenAPIRequest",
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
     *                  property="token",
     *                  ref="#/components/schemas/TokenPriceTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(TokenPrice $token, UpdateTokenAPIRequest $request)
    {
        $input = $request->validated();

        $token = $this->tokenPriceRepository->update($input, $token->id);

        return $this->respondSuccess([
            "token" => $token
        ]);
    }

    /**
     * Remove the specified TokenPrice from database.
     * DELETE /api/v1/tokens/id
     *
     * @param TokenPrice $token
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/tokens/{id}",
     *      summary="Remove the specified Token from database",
     *      tags={"Token"},
     *      description="Delete Token",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Token",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),ap
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
     *                  example="Token deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     * @throws \Exception
     *
     */

    public function destroy(TokenPrice $token)
    {
        $token->delete();

        return $this->respondSuccessWithMessage('TokenPrice deleted successfully');
    }
}
