<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialValidationRequest extends FormRequest
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
        'testi_text' => 'required',
        'testi_name' => 'required',
        'slug' => 'required|unique:testimonials',
        'testi_title' => 'required',
      ];
      switch($this->method()) {
        case 'PUT':
        case 'PATCH':
          $rules['slug'] = '';//'required|unique:lessions,slug,'.$this->route('lession');
          break;
      }

      return $rules;

    }
}
