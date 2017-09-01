<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (!( ($this->route('tag') == config('ownAttributes.default_tag.id') )));
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->with('message','Can not delete this');
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
