<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContractAPIRequest;
use App\Http\Requests\API\UpdateContractAPIRequest;
use App\Models\Contract;
use App\Repositories\ContractRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class ContractController
 * @package App\Http\Controllers\API
 */

class ContractAPIController extends APIController
{
    /** @var  ContractRepository */
    private $contractRepository;

    public function __construct(ContractRepository $contractRepo)
    {
        parent::__construct();
        $this->contractRepository = $contractRepo;
    }

    /**
     * Display a listing of the Contract.
     * GET /api/v1/contracts
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/contracts",
     *      summary="Get a listing of the Contract.",
     *      tags={"Contract"},
     *      description="Get all Contracts",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Contract will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="contracts",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/ContractTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $contracts = $this->contractRepository->list($limit, $filter);

        return $this->respondSuccess([
            "contracts" => $contracts
        ]);
    }

    /**
     * Store a newly created Contract in storage.
     * POST /api/v1/contracts
     *
     * @param CreateContractAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/contracts",
     *      summary="Store a newly created Contract in database",
     *      tags={"Contract"},
     *      description="Store Contract",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Contract",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateContractAPIRequest",
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
     *                  property="contract",
     *                  ref="#/components/schemas/ContractTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateContractAPIRequest $request)
    {
        $input = $request->validated();

        $contract = $this->contractRepository->create($input);

        return $this->respondSuccess([
            "contract" => $contract
        ]);
    }

    /**
     * Display the specified Contract.
     * GET /api/v1/contracts/id
     *
     * @param Contract $contract
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/contracts/{id}",
     *      summary="Display the specified Contract",
     *      tags={"Contract"},
     *      description="Get Contract",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of Contract",
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
     *                  property="contract",
     *                  ref="#/components/schemas/ContractTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function show(Contract $contract)
    {
        /** @var Contract $contract */
        $contract = $this->contractRepository->find($contract->id);

        return $this->respondSuccess([
            "contract" => $contract
        ]);
    }

    /**
     * Update the specified Contract in storage.
     * PUT /api/v1/contracts/id
     *
     * @param Contract $contract
     * @param UpdateContractAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/contracts/{id}",
     *      summary="Update the specified Contract in storage",
     *      tags={"Contract"},
     *      description="Update Contract",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Contract",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Contract",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateContractAPIRequest",
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
     *                  property="contract",
     *                  ref="#/components/schemas/ContractTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function update(Contract $contract, UpdateContractAPIRequest $request)
    {
        $input = $request->validated();

        $contract = $this->contractRepository->update($input, $contract->id);

        return $this->respondSuccess([
            "contract" => $contract
        ]);
    }

    /**
     * Remove the specified Contract from database.
     * DELETE /api/v1/contracts/id
     *
     * @param Contract $contract
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/contracts/{id}",
     *      summary="Remove the specified Contract from database",
     *      tags={"Contract"},
     *      description="Delete Contract",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of Contract",
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
     *                  example="Contract deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return $this->respondSuccessWithMessage('Contract deleted successfully');
    }
}
