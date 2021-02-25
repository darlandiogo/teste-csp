<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'email' => 'required|email',
            'phone' => 'required|min:14|max:15',
        ];
    }

     /**
     * Get the messages rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'O campo Nome  é obrigatório.',
            'first_name.min' => 'O campo Nome precisa ter no mínimo 2 caracteres.',
            'first_name.max' => 'O campo Nome precisa ter no máximo 100 caracteres.',
            'last_name.required' => 'O campo Sobrenome  é obrigatório.',
            'last_name.min' => 'O campo Sobrenome precisa ter no mínimo 2 caracteres.',
            'last_name.max' => 'O campo Sobrenome precisa ter no máximo 100 caracteres.',
            'email.required' => 'O campo E-mail  é obrigatório.',
            'email.email' => 'O campo E-mail não é válido.',
            'phone.required' => 'O campo Telefone  é obrigatório.',
            'phone.min' => 'O campo Telefone precisa ter no mínimo 10 caracteres com o DDD.',
            'phone.max' => 'O campo Telefone precisa ter no máximo 11 caracteres com o DDD.',
        ];
    }
}
