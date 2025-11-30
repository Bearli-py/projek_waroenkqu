<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('menu')?->id ?? null;

        $rules = [
            'nama'      => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'harga'     => ['required', 'numeric', 'min:0'],
            'kategori'  => ['required', 'in:makanan,minuman'],
            'gambar'    => [$id ? 'nullable' : 'required', 'image', 'max:2048'],
        ];

        return $rules;
    }
}