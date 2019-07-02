<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
        'title' => 'required|max:255|unique:categories,title,'.$this->route('category'),
        'slug' => 'required|max:255|unique:categories,slug,'.$this->route('category')
      ];
      switch($this->method()) {
        case 'PUT':
        case 'PATCH':
          $rules['slug'] = '';//'required|unique:instructions,slug,'.$this->route('instruction');
          break;
      }

      return $rules;
      // return [
      //   'title' => 'required|max:255|unique:categories,title,'.$this->route('category'),
      //   'slug' => 'required|max:255|unique:categories,slug,'.$this->route('category')
      //
      // ];
    }
}
