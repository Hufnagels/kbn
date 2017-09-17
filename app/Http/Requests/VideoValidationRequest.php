<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoValidationRequest extends FormRequest
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
      // dd(\Request::all());
      $rules = [
        'title' => 'required',
        'slug' => 'required|unique:videos',
        'url' => 'required|unique:videos',
        'yt_video_id' => 'required',
      ];
      switch($this->method()) {
        case 'PUT':
        case 'PATCH':
          $rules['slug'] = '';//'required|unique:lessions,slug,'.$this->route('lession');
          $rules['url'] = 'required|unique:videos,url,'.$this->route('video');
          break;
      }

      return $rules;

    }

}
