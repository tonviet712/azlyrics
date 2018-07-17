<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongDemand extends FormRequest
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
            'artist' => 'bail|required',
            'song'   => 'bail|required|max:255',
            'lyrics' => 'bail|required|min:10'
        ];
    }
}
