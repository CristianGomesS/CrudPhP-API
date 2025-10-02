<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthorStoreUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            // 'phone' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            // 'city' => 'required|string|max:255',
            // 'state' => 'required|string|max:255',
            // 'zip' => 'required|string|max:255',
            // 'country' => 'required|string|max:255',
            // 'bio' => 'required|string|max:255',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = response()->json([
            "error" => "Erro no envio de dados.",
            "details" => $errors->messages()
        ], 422);
        throw new HttpResponseException($response);
    }
}
