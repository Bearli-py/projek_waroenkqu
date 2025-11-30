<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimoniRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('testimoni')?->id ?? null;

        return [
            'nama'   => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'isi'    => ['required', 'string'],
            'avatar' => [$id ? 'nullable' : 'nullable', 'image', 'max:2048'],
        ];
    }
}