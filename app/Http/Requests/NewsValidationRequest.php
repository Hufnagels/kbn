<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsValidationRequest extends FormRequest
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
      $rules = [
        'title' => 'required',
        'slug' => 'required|unique:news',
        'body' => 'required',
        'category_id' => 'required',
        'image' => 'image'
      ];
      switch($this->method()) {
        case 'PUT':
        case 'PATCH':
          $rules['slug'] = 'required|unique:news,slug,'.$this->route('post');
          break;
      }

      return $rules;

    }
}
