<?php

namespace App\Http\Requests\API;

use App\Models\ContactRequest;
use App\Http\Requests\API\APIRequest;

/**
 * Class CreateContactRequestAPIRequest
 * @package App\Http\Requests\API
 *
 * @OA\Schema(
 *     title="ContactRequest Create Request",
 *     @OA\Xml(
 *         name="CreateContactRequestAPIRequest"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          ref="#/components/schemas/ContactRequest/properties/id",
 *     ),
 * )
 */
class CreateContactRequestAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $createRules = ContactRequest::$rules;
        $keyRules = ['name', 'company', 'email', 'content'];
        $createRules = getDataByKeys($createRules, $keyRules);
        return $createRules;
    }
}
