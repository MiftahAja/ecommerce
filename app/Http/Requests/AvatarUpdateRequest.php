<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvatarUpdateRequest extends FormRequest
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
            'avatar' => [
                'required',
                'image',
                'mimes:jpeg,jpg,png,webp',
                'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'avatar.required'   => 'File foto profil wajib diunggah.',
            'avatar.image'      => 'File harus berupa gambar.',
            'avatar.mimes'      => 'Format gambar harus JPEG, JPG, PNG, atau WEBP.',
            'avatar.max'        => 'Ukuran gambar maksimal 2MB.',
            'avatar.dimensions' => 'Dimensi gambar harus antara 100x100 hingga 2000x2000 piksel.',
        ];
    }
}
