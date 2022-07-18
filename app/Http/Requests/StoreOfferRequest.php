<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreOfferRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::guard('partner')->id(),
        ]);
    }


    public function rules()
    {
        return [
            'title'         => ['required', 'string', 'unique:offers', 'min:5', 'max:255'],
            'description'   => ['string', 'nullable'],
            'price'         => ['required', 'numeric'],
            'benefits'      => ['required'],
            'user_id'       => ['required', 'numeric'],
            'images.*'      => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:10240'],
            'city'          => ['required', 'string'],
        ];
    }
}
