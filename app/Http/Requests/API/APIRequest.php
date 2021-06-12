<?php


namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

/**
 * Class APIRequest
 * @package App\Http\Requests\API
 */
class APIRequest extends FormRequest
{
    public function validated()
    {
        $request = $this->validator->validated();
        $results = $request;
        $mapKeyToModels = [
        ];

        foreach ($mapKeyToModels as $key => $value) {
            if (isset($request[$key]) && $request[$key] != null) {
                if ($value[1] == 'object') {
                    Arr::set($results, $value[0], $value[2]->find($request[$key]));
                }

                if ($value[1] == 'array') {
                    Arr::set($results, $value[0], $value[2]->whereIn('id', $request[$key])->get());
                }
            }
        }

        return $results;
    }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
