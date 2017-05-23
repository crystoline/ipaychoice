<?php

namespace App\Http\Requests\Client\Admin;

use App\Models\Clients\Officer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginRequest extends FormRequest
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

    public function validator($factory){
        $validator = $factory->make(
            $this->all(),
            $this->container->call([$this, 'rules']),
            $this->messages(),
            $this->attributes()
        );

        $validator->after(function($validator) {
            //dd($validator->errors()->all());
            if(!$validator->errors()->all()) {
                $email = $this->input('email');
                $password = $this->input('password');
                if ($officer = Officer::where(['email' => $email])->get()->first()) {
                    if(Hash::check($password, $officer->password) == false){
                        $validator->errors()->add('password', __('Incorrect password'));
                    }else {
                        $this->session()->put('client_admin_officer', $officer);
                    }
                } else {
                    $validator->errors()->add('email', __('Invalid email'));
                }

            }
        });
        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
