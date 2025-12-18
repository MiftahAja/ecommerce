<?php

namespace App\Http\Requests\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:225',
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:225',

                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'phone' => [
                'nullable',
                'image',
                'mimes:png,jpg,jpeg,webp',
                'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',  
            ],

        ];
    }

    public function messages(): array{
        return [
            'phone.regex' => 'Format nomor telepon tidak valid. Gunakan format 08xx atau +628xx.',
            'avatar.max' => 'Ukuran foto maksimal 2MB.',
            'avatar.dimensions' => 'Dimensi foto harus antara 100x100 hingga 2000x2000 pixel.',
            'email.unique' => 'Email ini sudah digunakan oleh pengguna lain.',
        ];
    }

     public function attributes(): array
    {
        return [
            'name' => 'nama',
            'email' => 'alamat email',
            'phone' => 'nomor telepon',
            'address' => 'alamat domisili',
            'avatar' => 'foto profil',
        ];
    }
}
