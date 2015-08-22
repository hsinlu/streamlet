<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
        $rules= [
            'title' => 'required|max:200',
            'slug' => 'unique:articles,slug',
            'body' => 'required',
            'category' => 'required|max:30',
            'cover' => 'sometimes|mimes:jpg,jpeg,png,bmp',
        ];

        if ($this->is('admin/articles/update/*')) {
            $rules['slug'] = 'unique:articles,slug,' . $this->input('id');
        }
        
        return $rules;
    }
}
