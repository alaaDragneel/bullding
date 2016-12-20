<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BulldingRequest extends Request
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
          'name'          => 'required|min:5|max:100',
          'price'         => 'required',
          'rent'          => 'required|integer',
          'square'        => 'required|min:2|max:10',
          'type'          => 'required|integer',
          'small_dis'     => 'required|min:5|max:160',
          'meta'          => 'required|min:5|max:200',
          'langtuide'     => 'required',
          'latitiute'     => 'required',
          'decription'    => 'required|min:5',
          'status'        => 'required|integer',
          'rooms'         => 'required|integer',
        ];
    }
}
