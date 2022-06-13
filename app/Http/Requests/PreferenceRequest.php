<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreferenceRequest extends FormRequest
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
        return [
            'main_title' => 'required',
            'main_subtitle' => 'required',
            'main_video' => 'file|max:51200'
        ];
    }

    public function messages()
    {
        return [
            'main_video.max' => "Maximum file size to upload is 50MB.",
            'main_video.file' => "The main video must be a file",
            'main_video.required' => "The video field cannot be empty"
        ];
    }
}
