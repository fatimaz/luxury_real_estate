<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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

             'name'=> 'required|min:2|max:100',
             'price'=> 'required',
            // 'type'=> 'required|integer',
            // 'bu_small_ds'=> 'required|min:5|max:160',
             'meta'=> 'required|min:5|max:200',
             'large_ds' => 'required|min:5',
             'status' => 'required|integer',
             //'image' => 'mimes:png,jpg,jpeg',
             'category_id'=> 'required|integer'

//khseni nsawal 3la hadi
        ];
    }
}
