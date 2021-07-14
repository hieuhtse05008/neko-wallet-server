<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSwapOrderAPIRequest;
use App\Http\Requests\API\UpdateSwapOrderAPIRequest;
use App\Models\SwapOrder;
use App\Repositories\SwapOrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class SwapOrderController
 * @package App\Http\Controllers\API
 */

class SwapOrderAPIController extends APIController
{
    /** @var  SwapOrderRepository */
    private $swapOrderRepository;

    public function __construct(SwapOrderRepository $swapOrderRepo)
    {
        parent::__construct();
        $this->swapOrderRepository = $swapOrderRepo;
    }

    /**
     * Display a listing of the SwapOrder.
     * GET /api/v1/swap-orders
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/swap-orders",
     *      summary="Get a listing of the Swap Order.",
     *      tags={"SwapOrder"},
     *      description="Get all Swap Orders",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Swap Order will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="swap_orders",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/SwapOrderTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $swapOrders = $this->swapOrderRepository->list($limit, $filter);

        return $this->respondSuccess([
            "swap_orders" => $swapOrders
        ]);
    }

    /**
     * Store a newly created SwapOrder in storage.
     * POST /api/v1/swap-orders
     *
     * @param CreateSwapOrderAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/swap-orders",
     *      summary="Store a newly created Swap Order in database",
     *      tags={"SwapOrder"},
     *      description="Store Swap Order",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Swap Order",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateSwapOrderAPIRequest",
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
     *                  property="swap_order",
     *                  ref="#/components/schemas/SwapOrderTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateSwapOrderAPIRequest $request)
    {
        $input = $request->validated();

        $swapOrder = $this->swapOrderRepository->create($input);

        return $this->respondSuccess([
            "swap_order" => $swapOrder
        ]);
    }

    /**
     * Display the specified SwapOrder.
     * GET /api/v1/swap-orders/id
     *
     * @param SwapOrder $swapOrder
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/swap-orders/{id}",
     *      summary="Display the specified SwapOrder",
     *      tags={"SwapOrder"},
     *      description="Get SwapOrder",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of SwapOrder",
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
     *                  property="swap_order",
     *                  ref="#/components/schemas/SwapOrderTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(SwapOrder $swapOrder)
    {
        /** @var SwapOrder $swapOrder */
        $swapOrder = $this->swapOrderRepository->find($swapOrder->id);

        return $this->respondSuccess([
            "swap_order" => $swapOrder
        ]);
    }

    /**
     * Update the specified SwapOrder in storage.
     * PUT /api/v1/swap-orders/id
     *
     * @param SwapOrder $swapOrder
     * @param UpdateSwapOrderAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/swap-orders/{id}",
     *      summary="Update the specified SwapOrder in storage",
     *      tags={"SwapOrder"},
     *      description="Update SwapOrder",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of SwapOrder",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Swap Order",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateSwapOrderAPIRequest",
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
     *                  property="swap_order",
     *                  ref="#/components/schemas/SwapOrderTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(SwapOrder $swapOrder, UpdateSwapOrderAPIRequest $request)
    {
        $input = $request->validated();

        $swapOrder = $this->swapOrderRepository->update($input, $swapOrder->id);

        return $this->respondSuccess([
            "swap_order" => $swapOrder
        ]);
    }

    /**
     * Remove the specified SwapOrder from database.
     * DELETE /api/v1/swap-orders/id
     *
     * @param SwapOrder $swapOrder
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/swap-orders/{id}",
     *      summary="Remove the specified SwapOrder from database",
     *      tags={"SwapOrder"},
     *      description="Delete SwapOrder",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of SwapOrder",
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
     *                  example="Swap Order deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(SwapOrder $swapOrder)
    {
        $swapOrder->delete();

        return $this->respondSuccessWithMessage('Swap Order deleted successfully');
    }
}
