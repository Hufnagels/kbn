<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tagValidationRequest extends FormRequest
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
        'name' => 'required',
        'slug' => 'required|unique:tags'

      ];
      switch($this->method()) {
        case 'PUT':
        case 'PATCH':
          $rules['slug'] = 'required|unique:tags,slug,'.$this->route('tag');
          break;
      }

      return $rules;

    }
}
