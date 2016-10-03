<?php

namespace csi\Http\Requests;

use csi\Http\Requests\Request;

class StoreInfoRequest extends Request
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
            'name' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'fax' => ['required'],
            'image' => ['image', 'mimes:jpg,jpeg,png'],
            'longitude' => ['required'],
            'latitude' => ['required']
        ];
    }
}
