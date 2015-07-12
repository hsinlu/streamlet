<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GeneralRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'subtitle' => 'required|max:50',
            'keywords' => 'required|max:1000',
            'description' => 'required|max:1000',
            'paginate_size' => 'required|numeric|min:1',
        ];
    }
}
