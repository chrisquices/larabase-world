<?php

namespace Modules\World\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CountryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update_countries');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'       => 'required|max:255',
            'iso2'       => 'required|max:2',
            'iso3'       => 'required|max:3',
            'phone_code' => 'required|max:6',
            'region'     => 'required|max:255',
            'subregion'  => 'required|max:255',
            'latitude'   => 'required|max:255',
            'longitude'  => 'required|max:255',
            'emoji'      => 'required|max:255',
        ];
    }
}
