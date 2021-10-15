<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBlogGroupAPIRequest;
use App\Http\Requests\API\UpdateBlogGroupAPIRequest;
use App\Models\BlogGroup;
use App\Repositories\BlogGroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class BlogGroupController
 * @package App\Http\Controllers\API
 */

class BlogGroupAPIController extends APIController
{
    /** @var  BlogGroupRepository */
    private $blogGroupRepository;

    public function __construct(BlogGroupRepository $blogGroupRepo)
    {
        parent::__construct();
        $this->blogGroupRepository = $blogGroupRepo;
    }

    /**
     * Display a listing of the BlogGroup.
     * GET /api/v1/blog-groups
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/blog-groups",
     *      summary="Get a listing of the Blog Group.",
     *      tags={"BlogGroup"},
     *      description="Get all Blog Groups",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Blog Group will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="blog_groups",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/BlogGroupTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [
            'blog_group'=>[
                'type'=>$request->type,
            ],
        ];
        $limit = $request->limit ;
        $blogGroups = $this->blogGroupRepository->list($limit, $filter);

        return $this->respondSuccess([
            "blog_groups" => $blogGroups
        ]);
    }

    /**
     * Store a newly created BlogGroup in storage.
     * POST /api/v1/blog-groups
     *
     * @param CreateBlogGroupAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/blog-groups",
     *      summary="Store a newly created Blog Group in database",
     *      tags={"BlogGroup"},
     *      description="Store Blog Group",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Blog Group",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateBlogGroupAPIRequest",
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
     *                  property="blog_group",
     *                  ref="#/components/schemas/BlogGroupTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateBlogGroupAPIRequest $request)
    {
        $input = $request->validated();

        $blogGroup = $this->blogGroupRepository->create($input);

        return $this->respondSuccess([
            "blog_group" => $blogGroup
        ]);
    }

    /**
     * Display the specified BlogGroup.
     * GET /api/v1/blog-groups/id
     *
     * @param BlogGroup $blogGroup
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/blog-groups/{id}",
     *      summary="Display the specified BlogGroup",
     *      tags={"BlogGroup"},
     *      description="Get BlogGroup",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of BlogGroup",
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
     *                  property="blog_group",
     *                  ref="#/components/schemas/BlogGroupTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(BlogGroup $blogGroup)
    {
        /** @var BlogGroup $blogGroup */
        $blogGroup = $this->blogGroupRepository->find($blogGroup->id);

        return $this->respondSuccess([
            "blog_group" => $blogGroup
        ]);
    }

    /**
     * Update the specified BlogGroup in storage.
     * PUT /api/v1/blog-groups/id
     *
     * @param BlogGroup $blogGroup
     * @param UpdateBlogGroupAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/blog-groups/{id}",
     *      summary="Update the specified BlogGroup in storage",
     *      tags={"BlogGroup"},
     *      description="Update BlogGroup",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of BlogGroup",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Blog Group",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateBlogGroupAPIRequest",
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
     *                  property="blog_group",
     *                  ref="#/components/schemas/BlogGroupTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(BlogGroup $blogGroup, UpdateBlogGroupAPIRequest $request)
    {
        $input = $request->validated();

        $blogGroup = $this->blogGroupRepository->update($input, $blogGroup->id);

        return $this->respondSuccess([
            "blog_group" => $blogGroup
        ]);
    }

    /**
     * Remove the specified BlogGroup from database.
     * DELETE /api/v1/blog-groups/id
     *
     * @param BlogGroup $blogGroup
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/blog-groups/{id}",
     *      summary="Remove the specified BlogGroup from database",
     *      tags={"BlogGroup"},
     *      description="Delete BlogGroup",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of BlogGroup",
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
     *                  example="Blog Group deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(BlogGroup $blogGroup)
    {
        $blogGroup->delete();

        return $this->respondSuccessWithMessage('Blog Group deleted successfully');
    }
}
