<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTokenAPIRequest;
use App\Http\Requests\API\UpdateTokenAPIRequest;
use App\Models\Token;
use App\Repositories\TokenRepository;
use Illuminate\Http\Request;

/**
 * Class TokenController
 * @package App\Http\Controllers\API
 */

class TokenAPIController extends APIController
{
    /** @var  TokenRepository */
    private $tokenRepository;

    public function __construct(TokenRepository $tokenRepo)
    {
        parent::__construct();
        $this->tokenRepository = $tokenRepo;
    }

    /**
     * Display a listing of the Token.
     * GET /api/v1/tokens
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/tokens",
     *      summary="Get a listing of the Token.",
     *      tags={"Token"},
     *      description="Get all Tokens",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Token will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  @OA\Items(ref="#/components/schemas/TokenTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $tokens = $this->tokenRepository->list($limit, $filter);

        return $this->respondSuccess([
            "tokens" => $tokens
        ]);
    }

    /**
     * Store a newly created Token in storage.
     * POST /api/v1/tokens
     *
     * @param CreateTokenAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/tokens",
     *      summary="Store a newly created Token in database",
     *      tags={"Token"},
     *      description="Store Token",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Token",
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
     *                  ref="#/components/schemas/TokenTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateTokenAPIRequest $request)
    {
        $input = $request->validated();

        $token = $this->tokenRepository->create($input);

        return $this->respondSuccess([
            "token" => $token
        ]);
    }

    /**
     * Display the specified Token.
     * GET /api/v1/tokens/id
     *
     * @param Token $token
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/tokens/{id}",
     *      summary="Display the specified Token",
     *      tags={"Token"},
     *      description="Get Token",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of Token",
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
     *                  ref="#/components/schemas/TokenTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(Token $token)
    {
        /** @var Token $token */
        $token = $this->tokenRepository->find($token->id);

        return $this->respondSuccess([
            "token" => $token
        ]);
    }

    /**
     * Update the specified Token in storage.
     * PUT /api/v1/tokens/id
     *
     * @param Token $token
     * @param UpdateTokenAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/tokens/{id}",
     *      summary="Update the specified Token in storage",
     *      tags={"Token"},
     *      description="Update Token",
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
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Token",
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
     *                  ref="#/components/schemas/TokenTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(Token $token, UpdateTokenAPIRequest $request)
    {
        $input = $request->validated();

        $token = $this->tokenRepository->update($input, $token->id);

        return $this->respondSuccess([
            "token" => $token
        ]);
    }

    /**
     * Remove the specified Token from database.
     * DELETE /api/v1/tokens/id
     *
     * @param Token $token
     *
     * @throws \Exception
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
     */

    public function destroy(Token $token)
    {
        $token->delete();

        return $this->respondSuccessWithMessage('Token deleted successfully');
    }
}
