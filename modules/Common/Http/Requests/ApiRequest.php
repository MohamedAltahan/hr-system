<?php

namespace Modules\Common\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Modules\Common\Enums\StatusCodeEnum;
use Modules\Common\Traits\ApiResponse;

abstract class ApiRequest extends FormRequest
{
    use ApiResponse;

    /**
     * Get the validation rules that apply to the request.
     */
    abstract public function rules(): array;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $response = $this->sendResponse(
                $validator->errors()->toArray(),
                $validator->errors()->first(),
                StatusCodeEnum::Unprocessable_content->value
            );
            throw new ValidationException($validator, $response);
        }
    }
}
