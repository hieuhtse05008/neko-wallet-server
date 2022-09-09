<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactRequestAPIRequest;
use App\Http\Requests\API\UpdateContactRequestAPIRequest;
use App\Models\ContactRequest;
use App\Repositories\ContactRequestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\API\APIController;
use Response;

/**
 * Class ContactRequestController
 * @package App\Http\Controllers\API
 */

class ContactRequestAPIController extends APIController
{
    /** @var  ContactRequestRepository */
    private $contactRequestRepository;

    public function __construct(ContactRequestRepository $contactRequestRepo)
    {
        parent::__construct();
        $this->contactRequestRepository = $contactRequestRepo;
    }

    /**
     * Display a listing of the ContactRequest.
     * GET /api/v1/contact-requests
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/contact-requests",
     *      summary="Get a listing of the Contact Request.",
     *      tags={"ContactRequest"},
     *      description="Get all Contact Requests",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of records the Contact Request will return. Default: 0/'empty' (get all), greater than 0 (limited by value)",
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
     *                  property="contact_requests",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/ContactRequestTransformer"),
     *              ),
     *          ),
     *      ),

     * )
     */

    public function index(Request $request)
    {
        $filter = [];
        $limit = $request->limit;
        $contactRequests = $this->contactRequestRepository->list($limit, $filter);

        return $this->respondSuccess([
            "contact_requests" => $contactRequests
        ]);
    }

    /**
     * Store a newly created ContactRequest in storage.
     * POST /api/v1/contact-requests
     *
     * @param CreateContactRequestAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Post(
     *      path="/api/v1/contact-requests",
     *      summary="Store a newly created Contact Request in database",
     *      tags={"ContactRequest"},
     *      description="Store Contact Request",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Contact Request",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/CreateContactRequestAPIRequest",
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
     *                  property="contact_request",
     *                  ref="#/components/schemas/ContactRequestTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function store(CreateContactRequestAPIRequest $request)
    {
        $input = $request->validated();

        $contactRequest = $this->contactRequestRepository->create($input);

        return $this->respondSuccess([
            "contact_request" => $contactRequest
        ]);
    }

    /**
     * Display the specified ContactRequest.
     * GET /api/v1/contact-requests/id
     *
     * @param ContactRequest $contactRequest
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/v1/contact-requests/{id}",
     *      summary="Display the specified ContactRequest",
     *      tags={"ContactRequest"},
     *      description="Get ContactRequest",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          description="id of ContactRequest",
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
     *                  property="contact_request",
     *                  ref="#/components/schemas/ContactRequestTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    /**
     * Update the specified ContactRequest in storage.
     * PUT /api/v1/contact-requests/id
     *
     * @param ContactRequest $contactRequest
     * @param UpdateContactRequestAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/v1/contact-requests/{id}",
     *      summary="Update the specified ContactRequest in storage",
     *      tags={"ContactRequest"},
     *      description="Update ContactRequest",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of ContactRequest",
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Data of Contact Request",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/UpdateContactRequestAPIRequest",
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
     *                  property="contact_request",
     *                  ref="#/components/schemas/ContactRequestTransformer",
     *              ),
     *          ),
     *      ),
     * )
     */

    /**
     * Remove the specified ContactRequest from database.
     * DELETE /api/v1/contact-requests/id
     *
     * @param ContactRequest $contactRequest
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Delete(
     *      path="/api/v1/contact-requests/{id}",
     *      summary="Remove the specified ContactRequest from database",
     *      tags={"ContactRequest"},
     *      description="Delete ContactRequest",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="id of ContactRequest",
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
     *                  example="Contact Request deleted successfully",
     *              ),
     *          ),
     *      ),
     * )
     */

    public function destroy(ContactRequest $contactRequest)
    {
        $contactRequest->delete();

        return $this->respondSuccessWithMessage('Contact Request deleted successfully');
    }
}
