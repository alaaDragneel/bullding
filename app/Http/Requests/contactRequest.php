<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class contactRequest extends Request
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
            'contactName'     => 'required|min:5|max:100' ,
            'contactEmail'    => 'required|email|min:5|max:100' ,
            'contactType'  => 'required|min:1|integer' ,
            'contactMessage'  => 'required|min:5' ,
        ];
    }
}
