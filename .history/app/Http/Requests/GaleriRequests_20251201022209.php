<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleriRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('galeri')?->id ?? null;

        return [
            'kategori' => ['required', 'in:makanan,minuman,suasana'],
            'caption'  => ['nullable', 'string', 'max:255'],
            'filename' => [$id ? 'nullable' : 'required', 'image', 'max:4096'],
        ];
    }
}