<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTokenAPIRequest;
use App\Http\Requests\API\UpdateTokenAPIRequest;
use App\Models\Token;
use App\Repositories\TokenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TokenResource;
use Response;

/**
 * Class TokenController
 * @package App\Http\Controllers\API
 */

class TokenAPIController extends AppBaseController
{
    /** @var  TokenRepository */
    private $tokenRepository;

    public function __construct(TokenRepository $tokenRepo)
    {
        $this->tokenRepository = $tokenRepo;
    }

    /**
     * Display a listing of the Token.
     * GET|HEAD /tokens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tokens = $this->tokenRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TokenResource::collection($tokens), 'Tokens retrieved successfully');
    }

    /**
     * Store a newly created Token in storage.
     * POST /tokens
     *
     * @param CreateTokenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTokenAPIRequest $request)
    {
        $input = $request->all();

        $token = $this->tokenRepository->create($input);

        return $this->sendResponse(new TokenResource($token), 'Token saved successfully');
    }

    /**
     * Display the specified Token.
     * GET|HEAD /tokens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Token $token */
        $token = $this->tokenRepository->find($id);

        if (empty($token)) {
            return $this->sendError('Token not found');
        }

        return $this->sendResponse(new TokenResource($token), 'Token retrieved successfully');
    }

    /**
     * Update the specified Token in storage.
     * PUT/PATCH /tokens/{id}
     *
     * @param int $id
     * @param UpdateTokenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTokenAPIRequest $request)
    {
        $input = $request->all();

        /** @var Token $token */
        $token = $this->tokenRepository->find($id);

        if (empty($token)) {
            return $this->sendError('Token not found');
        }

        $token = $this->tokenRepository->update($input, $id);

        return $this->sendResponse(new TokenResource($token), 'Token updated successfully');
    }

    /**
     * Remove the specified Token from storage.
     * DELETE /tokens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Token $token */
        $token = $this->tokenRepository->find($id);

        if (empty($token)) {
            return $this->sendError('Token not found');
        }

        $token->delete();

        return $this->sendSuccess('Token deleted successfully');
    }
}
