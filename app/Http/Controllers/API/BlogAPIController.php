<?php

namespace App\Http\Controllers\API;

use App\Enum\BlogGroup;
use App\Http\Requests\API\CreateBlogAPIRequest;
use App\Http\Requests\API\UpdateBlogAPIRequest;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use App\Repositories\RefBlogGroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class BlogController
 * @package App\Http\Controllers\API
 */

class BlogAPIController extends APIController
{
    /** @var  BlogRepository */
    private $blogRepository;
    private $refBlogGroupRepository;

    public function __construct(BlogRepository $blogRepo, RefBlogGroupRepository $refBlogGroupRepository)
    {
        parent::__construct();
        $this->blogRepository = $blogRepo;
        $this->refBlogGroupRepository = $refBlogGroupRepository;
    }

    /**
     * Display a listing of the Blog.
     * GET /api/v1/blogs
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/blogs",
     *      summary="Get a listing of the Blog.",
     *      tags={"Blog"},
     *      description="Get all Blogs",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Blog will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="blogs",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/BlogTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [
            'blog'=>[
                'statuses'=>$request->statuses
            ],
            'blog_group'=>[
                'ids'=>$request->blog_group_ids,
                'type'=>$request->type,
            ],
        ];
        $limit = $request->limit;
        $blogs = $this->blogRepository->list($limit, $filter);

        return $this->respondSuccess([
            "blogs" => $blogs
        ]);
    }

    /**
     * Store a newly created Blog in storage.
     * POST /api/v1/blogs
     *
     * @param CreateBlogAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/blogs",
     *      summary="Store a newly created Blog in database",
     *      tags={"Blog"},
     *      description="Store Blog",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Blog",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateBlogAPIRequest",
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
     *                  property="blog",
     *                  ref="#/components/schemas/BlogTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateBlogAPIRequest $request)
    {
        $input = $request->validated();
        $blog = $this->blogRepository->create($input);

        foreach (array_keys(BlogGroup::TYPES) as $type){
            if(isset($input["{$type}_id"])){
                $this->refBlogGroupRepository->updateOrCreate([
                    'blog_id' => $blog['id'],
                    'type'=>$type,
                ],[
                    'blog_group_id' => $input["{$type}_id"],
                ]);
            }
        }

        return $this->respondSuccess([
            "blog" => $blog
        ]);
    }

    /**
     * Display the specified Blog.
     * GET /api/v1/blogs/id
     *
     * @param Blog $blog
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/blogs/{id}",
     *      summary="Display the specified Blog",
     *      tags={"Blog"},
     *      description="Get Blog",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of Blog",
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
     *                  property="blog",
     *                  ref="#/components/schemas/BlogTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(Blog $blog)
    {
        /** @var Blog $blog */
        $blog = $this->blogRepository->find($blog->id);

        return $this->respondSuccess([
            "blog" => $blog
        ]);
    }

    /**
     * Update the specified Blog in storage.
     * PUT /api/v1/blogs/id
     *
     * @param Blog $blog
     * @param UpdateBlogAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/blogs/{id}",
     *      summary="Update the specified Blog in storage",
     *      tags={"Blog"},
     *      description="Update Blog",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Blog",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Blog",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateBlogAPIRequest",
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
     *                  property="blog",
     *                  ref="#/components/schemas/BlogTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(Blog $blog, UpdateBlogAPIRequest $request)
    {
        $input = $request->validated();

        $blog = $this->blogRepository->update($input, $blog->id);
        foreach (array_keys(BlogGroup::TYPES) as $type){
            if(isset($input["{$type}_id"])){
                $this->refBlogGroupRepository->updateOrCreate([
                    'blog_id' => $blog['id'],
                    'type'=>$type,
                ],[
                    'blog_group_id' => $input["{$type}_id"],
                ]);
            }

        }

        return $this->respondSuccess([
            "blog" => $blog
        ]);
    }

    /**
     * Remove the specified Blog from database.
     * DELETE /api/v1/blogs/id
     *
     * @param Blog $blog
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/blogs/{id}",
     *      summary="Remove the specified Blog from database",
     *      tags={"Blog"},
     *      description="Delete Blog",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Blog",
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
     *                  example="Blog deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return $this->respondSuccessWithMessage('Blog deleted successfully');
    }
}
