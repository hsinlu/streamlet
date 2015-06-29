<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SetupRequest extends Request
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
        return [
            'name' => 'required|max:30',
            'bio' => 'required|max:100',
            'title' => 'required|max:50',
            'subtitle' => 'required|max:50',
            'keywords' => 'required|max:1000',
            'description' => 'required|max:1000',
        ];
    }
}
