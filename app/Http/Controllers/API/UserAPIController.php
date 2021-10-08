<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends APIController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        parent::__construct();
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     * GET /api/v1/users
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/users",
     *      summary="Get a listing of the User.",
     *      tags={"User"},
     *      description="Get all Users",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the User will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="users",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/UserTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $users = $this->userRepository->list($limit, $filter);

        return $this->respondSuccess([
            "users" => $users
        ]);
    }

    /**
     * Store a newly created User in storage.
     * POST /api/v1/users
     *
     * @param CreateUserAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/users",
     *      summary="Store a newly created User in database",
     *      tags={"User"},
     *      description="Store User",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of User",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateUserAPIRequest",
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
     *                  property="user",
     *                  ref="#/components/schemas/UserTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateUserAPIRequest $request)
    {
        $input = $request->validated();

        $user = $this->userRepository->create($input);

        return $this->respondSuccess([
            "user" => $user
        ]);
    }

    /**
     * Display the specified User.
     * GET /api/v1/users/id
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/users/{id}",
     *      summary="Display the specified User",
     *      tags={"User"},
     *      description="Get User",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of User",
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
     *                  property="user",
     *                  ref="#/components/schemas/UserTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(User $user)
    {
        /** @var User $user */
        $user = $this->userRepository->find($user->id);

        return $this->respondSuccess([
            "user" => $user
        ]);
    }

    /**
     * Update the specified User in storage.
     * PUT /api/v1/users/id
     *
     * @param User $user
     * @param UpdateUserAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/users/{id}",
     *      summary="Update the specified User in storage",
     *      tags={"User"},
     *      description="Update User",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of User",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of User",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateUserAPIRequest",
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
     *                  property="user",
     *                  ref="#/components/schemas/UserTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(User $user, UpdateUserAPIRequest $request)
    {
        $input = $request->validated();

        $user = $this->userRepository->update($input, $user->id);

        return $this->respondSuccess([
            "user" => $user
        ]);
    }

    /**
     * Remove the specified User from database.
     * DELETE /api/v1/users/id
     *
     * @param User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/users/{id}",
     *      summary="Remove the specified User from database",
     *      tags={"User"},
     *      description="Delete User",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of User",
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
     *                  example="User deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(User $user)
    {
        $user->delete();

        return $this->respondSuccessWithMessage('User deleted successfully');
    }
}
