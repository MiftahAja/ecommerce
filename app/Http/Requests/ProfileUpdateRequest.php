<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

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
            // Nama: wajib, string, max 255 karakter
            'name'    => [
                'required',
                'string',
                'max:255',
            ],

            // Email: wajib, format email valid, unik (kecuali milik user ini)
            // Kasus Penting: User ingin ganti nama tapi tidak ganti email.
            // Jika validasi email tetap 'unique:users', maka akan error "Email sudah terdaftar" (karena email dia sendiri).
            // Solusi: ->ignore($id) memberitahu database untuk melewati pengecekan unique pada baris ID user ini.
            'email'   => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                // Rule::unique('users')->ignore($this->user()->id)
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            // Phone: opsional, regex khusus format Indonesia
            // Menerima: 0812..., 62812..., +62812...
            'phone'   => [
                'nullable',
                'string',
                'max:20',
            ],

            // Address: opsional, text max 500 karakter
            'address' => [
                'nullable',
                'string',
                'max:500',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex'       => 'Format nomor telepon tidak valid. Gunakan format 08xx atau +628xx.',
            'email.unique'      => 'Email ini sudah digunakan oleh pengguna lain.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'    => 'nama',
            'email'   => 'alamat email',
            'phone'   => 'nomor telepon',
            'address' => 'alamat domisili',
            'avatar'  => 'foto profil',
        ];
    }
}