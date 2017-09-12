<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagUpdateRequest extends FormRequest
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
        'name' => 'required|max:255|unique:tags,name,'.$this->route('tag'),
        'slug' => 'required|max:255|unique:tags,slug,'.$this->route('tag')
      ];
      switch($this->method()) {
        case 'PUT':
        case 'PATCH':
          $rules['slug'] = '';//'required|unique:instructions,slug,'.$this->route('instruction');
          break;
      }

      return $rules;
      // return [
      //   'name' => 'required|max:255|unique:tags,name,'.$this->route('tag'),
      //   'slug' => 'required|max:255|unique:tags,slug,'.$this->route('tag')
      //
      // ];
    }
}
