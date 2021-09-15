<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategoryAPIRequest;
use App\Http\Requests\API\UpdateCategoryAPIRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class CategoryController
 * @package App\Http\Controllers\API
 */

class CategoryAPIController extends APIController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        parent::__construct();
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     * GET /api/v1/categories
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/categories",
     *      summary="Get a listing of the Category.",
     *      tags={"Category"},
     *      description="Get all Categories",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Category will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="categories",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/CategoryTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $categories = $this->categoryRepository->list($limit, $filter);

        return $this->respondSuccess([
            "categories" => $categories
        ]);
    }

    /**
     * Store a newly created Category in storage.
     * POST /api/v1/categories
     *
     * @param CreateCategoryAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/categories",
     *      summary="Store a newly created Category in database",
     *      tags={"Category"},
     *      description="Store Category",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Category",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateCategoryAPIRequest",
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
     *                  property="category",
     *                  ref="#/components/schemas/CategoryTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateCategoryAPIRequest $request)
    {
        $input = $request->validated();

        $category = $this->categoryRepository->create($input);

        return $this->respondSuccess([
            "category" => $category
        ]);
    }

    /**
     * Display the specified Category.
     * GET /api/v1/categories/id
     *
     * @param Category $category
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/categories/{id}",
     *      summary="Display the specified Category",
     *      tags={"Category"},
     *      description="Get Category",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of Category",
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
     *                  property="category",
     *                  ref="#/components/schemas/CategoryTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(Category $category)
    {
        /** @var Category $category */
        $category = $this->categoryRepository->find($category->id);

        return $this->respondSuccess([
            "category" => $category
        ]);
    }

    /**
     * Update the specified Category in storage.
     * PUT /api/v1/categories/id
     *
     * @param Category $category
     * @param UpdateCategoryAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/categories/{id}",
     *      summary="Update the specified Category in storage",
     *      tags={"Category"},
     *      description="Update Category",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Category",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Category",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateCategoryAPIRequest",
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
     *                  property="category",
     *                  ref="#/components/schemas/CategoryTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(Category $category, UpdateCategoryAPIRequest $request)
    {
        $input = $request->validated();

        $category = $this->categoryRepository->update($input, $category->id);

        return $this->respondSuccess([
            "category" => $category
        ]);
    }

    /**
     * Remove the specified Category from database.
     * DELETE /api/v1/categories/id
     *
     * @param Category $category
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/categories/{id}",
     *      summary="Remove the specified Category from database",
     *      tags={"Category"},
     *      description="Delete Category",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Category",
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
     *                  example="Category deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(Category $category)
    {
        $category->delete();

        return $this->respondSuccessWithMessage('Category deleted successfully');
    }
}
