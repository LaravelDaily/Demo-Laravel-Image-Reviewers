<?php

namespace App\Http\Requests;

use App\Photo;
use Illuminate\Foundation\Http\FormRequest;

class StorePhotoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('photo_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
            'photo' => [
                'required',
            ],
        ];
    }
}
