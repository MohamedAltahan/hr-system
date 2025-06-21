<?php

namespace Modules\System\HiringApplication\Http\Requests;

use Modules\Common\Http\Requests\ApiRequest;

class HiringApplicationRequest extends ApiRequest
{
    public function rules(): array
    {
        $position_id = $this->route('position');

        return [
            'opening_position_id' => ['required', 'exists:opening_positions,id'],
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:50',
            'phone' => 'required|string|max:50',
            'current_salary' => 'nullable|string',
            'expected_salary' => 'nullable|string',
            'religion' => 'nullable|string|max:50',
            'nationality' => 'nullable|string|max:50',
            'birthdate' => 'nullable|date|max:50',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:3000',
        ];
    }
}
