<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RequestUser extends FormRequest
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
            'name'                  => 'required|min:5|max:100',
            'username'              => 'required|min:5|max:100',
            'roles'                 => "required",
            'phone'                 => "required|digits_between:10,14|numeric",
            'address'               => "required|min:20|max:200",
            'avatar'                => "required",
            'email'                 => "required|email",
            'password'              => "required",
            'password_confirmation' => "required|same:password"

        ];
    }

    public function messages()
    {
        return[
            'name.required'                         => 'Nama Wajib Diisi!',
            'name.min:5'                            => 'Minimal 5 Karakter',
            'name.max:100'                          => 'Maksimal 100 karakter',
            'username.required'                     => 'Username Wajib Diisi',
            'username.min:5'                        => 'Minimal 5 Karakter',
            'username.max:100'                      => 'Maksimal 100 karakter',
            'roles.required'                        => 'Roles Wajib Diisi',
            'phone.required'                        => 'Phone Wajib Diisi',
            'phone.digits_between:10,14'            => 'Karakter antara 10 sampai 14 karakter',
            'phone.numeric'                         => 'Phone harus dalam bentuk angka',
            'address.required'                      => 'Alamat Wajib Diisi',
            'address.min:20'                        => 'Minimal 20 Karakter',
            'address.max:200'                       => 'Maksimal 200 karakter',
            'avatar.required'                       => 'Foto Profile Wajib Diisi',
            'email.required'                        => 'Email Wajib Diisi',
            'email.email'                           => 'Email Anda tidak sesuai dengan aturan penulisan pada umumnya!',
            'password.required'                     => 'Password Wajib Diisi',
            'password_confirmation.required'        => 'Konfirmasi Password Harus Diisi',
            'password_confirmation.same:password'   => 'Konfirmasi Password yang dimasukkan tidak sesuai',

        ];
    }

}
