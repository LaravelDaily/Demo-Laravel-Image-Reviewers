<?php

namespace App\Http\Requests;

use App\Photo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPhotoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('photo_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:photos,id',
        ];
    }
}
