<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleValidationRequest extends FormRequest
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
      // dd($this->method());
      $rules = [
        'display_name' => 'required|max:255',
        'name' => 'required|max:100|unique:roles',
        'description' => 'max:255'
      ];
      switch($this->method()) {
        case 'PUT':
        case 'PATCH':
          $rules['name'] = 'required|unique:roles,name,'.$this->route('roles');
          break;
      }

      return $rules;

    }
}
