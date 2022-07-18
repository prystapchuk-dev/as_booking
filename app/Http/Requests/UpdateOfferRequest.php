<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateOfferRequest extends FormRequest
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
            'title'         => ['required', 'string', 'unique:offers', 'min:5', 'max:255'],
            'description'   => ['string', 'nullable'],
            'price'         => ['required', 'numeric'],
            'benefits'      => ['required'],
            'images.*'      => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:10240'],
        ];
    }
}
