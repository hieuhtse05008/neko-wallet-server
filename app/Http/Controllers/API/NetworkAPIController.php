<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNetworkAPIRequest;
use App\Http\Requests\API\UpdateNetworkAPIRequest;
use App\Models\Network;
use App\Repositories\NetworkRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class NetworkController
 * @package App\Http\Controllers\API
 */

class NetworkAPIController extends APIController
{
    /** @var  NetworkRepository */
    private $networkRepository;

    public function __construct(NetworkRepository $networkRepo)
    {
        parent::__construct();
        $this->networkRepository = $networkRepo;
    }

    /**
     * Display a listing of the Network.
     * GET /api/v1/networks
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/networks",
     *      summary="Get a listing of the Network.",
     *      tags={"Network"},
     *      description="Get all Networks",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Network will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="networks",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/NetworkTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $networks = $this->networkRepository->list($limit, $filter);

        return $this->respondSuccess([
            "networks" => $networks
        ]);
    }

    /**
     * Display the specified Network.
     * GET /api/v1/networks/id
     *
     * @param Network $network
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/networks/{id}",
     *      summary="Display the specified Network",
     *      tags={"Network"},
     *      description="Get Network",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of Network",
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
     *                  property="network",
     *                  ref="#/components/schemas/NetworkTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(Network $network)
    {
        /** @var Network $network */
        $network = $this->networkRepository->find($network->id);

        return $this->respondSuccess([
            "network" => $network
        ]);
    }


}
