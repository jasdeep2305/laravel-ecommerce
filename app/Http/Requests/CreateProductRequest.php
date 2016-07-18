<?php

namespace App\Http\Requests;

class CreateProductRequest extends Request
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
     * Get the validation rules that apply to the request for adding a new product
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_title'=>'required|min:8',
           // 'product_desription'=>'required|max:255',
            'product_sellername'=>'required',
            'product_sellerid'=>'integer',

        ];
    }
}
