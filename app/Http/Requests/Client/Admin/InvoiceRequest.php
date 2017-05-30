<?php

namespace App\Http\Requests\Client\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'item.*' => 'required',
            'desc.*' => 'required',
            'customer' => 'required',
            'invoice_due_date' => 'required'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->input('item')) {
                $validator->errors()->add('item', 'You need to add at least one item to the invoice');
            }
        });
    }
}
