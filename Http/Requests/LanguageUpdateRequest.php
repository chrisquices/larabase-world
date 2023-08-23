<?php

namespace Modules\World\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class LanguageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update_languages');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'code'           => 'required|max:255',
            'name'           => 'required|max:255',
            'name_native'    => 'required|max:255',
            'writing_system' => 'required|max:3',
        ];
    }
}
