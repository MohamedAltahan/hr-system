<?php

namespace Modules\System\Profile\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Common\Http\Requests\ApiRequest;
use Modules\Common\Rules\UniqueJson;

class ProfileRequest extends ApiRequest
{
    public function rules(): array
    {
        $user_id = request()->user()->id;

        return [
            'name' => ['required', 'array', 'max:255'],
            'email' => ['string', 'email', 'max:50', Rule::unique('users', 'email')->ignore($user_id)],
            'phone' => ['string', 'max:20', Rule::unique('users', 'phone')->ignore($user_id)],
            'password' => ['string', 'min:3', 'max:20', 'confirmed'],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
        ];
    }
}
