<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //  public function authorize()
    //  {
    //    return true;
    //  }

     public function authorize()
     {

        return ! (($this->route('user') == config('userAttributes.default_user.id')) || ($this->route('user') == Auth::user()->id));
     }

     public function forbiddenResponse()
     {
         return view('error.403')->with('message','oops');
     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
