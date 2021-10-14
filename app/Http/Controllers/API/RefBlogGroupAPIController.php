<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRefBlogGroupAPIRequest;
use App\Http\Requests\API\UpdateRefBlogGroupAPIRequest;
use App\Models\RefBlogGroup;
use App\Repositories\RefBlogGroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class RefBlogGroupController
 * @package App\Http\Controllers\API
 */

class RefBlogGroupAPIController extends APIController
{
    /** @var  RefBlogGroupRepository */
    private $refBlogGroupRepository;

    public function __construct(RefBlogGroupRepository $refBlogGroupRepo)
    {
        parent::__construct();
        $this->refBlogGroupRepository = $refBlogGroupRepo;
    }

    /**
     * Display a listing of the RefBlogGroup.
     * GET /api/v1/ref-blog-groups
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/ref-blog-groups",
     *      summary="Get a listing of the Ref Blog Group.",
     *      tags={"RefBlogGroup"},
     *      description="Get all Ref Blog Groups",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Ref Blog Group will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="ref_blog_groups",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/RefBlogGroupTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $refBlogGroups = $this->refBlogGroupRepository->list($limit, $filter);

        return $this->respondSuccess([
            "ref_blog_groups" => $refBlogGroups
        ]);
    }

    /**
     * Store a newly created RefBlogGroup in storage.
     * POST /api/v1/ref-blog-groups
     *
     * @param CreateRefBlogGroupAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/ref-blog-groups",
     *      summary="Store a newly created Ref Blog Group in database",
     *      tags={"RefBlogGroup"},
     *      description="Store Ref Blog Group",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Ref Blog Group",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateRefBlogGroupAPIRequest",
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
     *                  property="ref_blog_group",
     *                  ref="#/components/schemas/RefBlogGroupTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateRefBlogGroupAPIRequest $request)
    {
        $input = $request->validated();

        $refBlogGroup = $this->refBlogGroupRepository->create($input);

        return $this->respondSuccess([
            "ref_blog_group" => $refBlogGroup
        ]);
    }

    /**
     * Display the specified RefBlogGroup.
     * GET /api/v1/ref-blog-groups/id
     *
     * @param RefBlogGroup $refBlogGroup
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/ref-blog-groups/{id}",
     *      summary="Display the specified RefBlogGroup",
     *      tags={"RefBlogGroup"},
     *      description="Get RefBlogGroup",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of RefBlogGroup",
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
     *                  property="ref_blog_group",
     *                  ref="#/components/schemas/RefBlogGroupTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(RefBlogGroup $refBlogGroup)
    {
        /** @var RefBlogGroup $refBlogGroup */
        $refBlogGroup = $this->refBlogGroupRepository->find($refBlogGroup->id);

        return $this->respondSuccess([
            "ref_blog_group" => $refBlogGroup
        ]);
    }

    /**
     * Update the specified RefBlogGroup in storage.
     * PUT /api/v1/ref-blog-groups/id
     *
     * @param RefBlogGroup $refBlogGroup
     * @param UpdateRefBlogGroupAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/ref-blog-groups/{id}",
     *      summary="Update the specified RefBlogGroup in storage",
     *      tags={"RefBlogGroup"},
     *      description="Update RefBlogGroup",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of RefBlogGroup",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Ref Blog Group",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateRefBlogGroupAPIRequest",
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
     *                  property="ref_blog_group",
     *                  ref="#/components/schemas/RefBlogGroupTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(RefBlogGroup $refBlogGroup, UpdateRefBlogGroupAPIRequest $request)
    {
        $input = $request->validated();

        $refBlogGroup = $this->refBlogGroupRepository->update($input, $refBlogGroup->id);

        return $this->respondSuccess([
            "ref_blog_group" => $refBlogGroup
        ]);
    }

    /**
     * Remove the specified RefBlogGroup from database.
     * DELETE /api/v1/ref-blog-groups/id
     *
     * @param RefBlogGroup $refBlogGroup
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/ref-blog-groups/{id}",
     *      summary="Remove the specified RefBlogGroup from database",
     *      tags={"RefBlogGroup"},
     *      description="Delete RefBlogGroup",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of RefBlogGroup",
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
     *                  example="Ref Blog Group deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(RefBlogGroup $refBlogGroup)
    {
        $refBlogGroup->delete();

        return $this->respondSuccessWithMessage('Ref Blog Group deleted successfully');
    }
}
