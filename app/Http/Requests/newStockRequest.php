<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class newStockRequest extends Request
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
            //
            'orderId' => 'required',
            'expiry_date' => 'required',
            'genericName' => 'required',
            'brandName' => 'required',
            'batchNumber' => 'required',
            'type' => 'required',
            'strength' => 'required',
            'departmentId' => 'required',
            'purchaseCost' => 'required',
            'markup' => 'required',
            'taxProfile1' => 'required',
            'taxProfile2' => 'required',
            'quantity' => 'required',
            'reorderLevel' => 'required',
        ];
    }
}
