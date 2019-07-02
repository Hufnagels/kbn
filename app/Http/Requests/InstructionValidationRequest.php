<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructionValidationRequest extends FormRequest
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
        'subtitle' => 'required',
        'slug' => 'required|unique:instructions',
        'excerpt' => 'required',
        'body' => 'required',
        // 'image' => 'image'
      ];
      switch($this->method()) {
        case 'PUT':
        case 'PATCH':
          $rules['slug'] = '';//'required|unique:instructions,slug,'.$this->route('instruction');
          break;
      }

      return $rules;

    }
}
