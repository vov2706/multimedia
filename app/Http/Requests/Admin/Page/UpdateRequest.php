<?php

namespace App\Http\Requests\Admin\Page;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_ua' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'h1_ua' => ['string', 'max:255', 'nullable'],
            'h1_en' => ['string', 'max:255', 'nullable'],
            'h2_ua' => ['string', 'max:255', 'nullable'],
            'h2_en' => ['string', 'max:255', 'nullable'],
            'title_ua' => ['string', 'max:255', 'nullable'],
            'title_en' => ['string', 'max:255', 'nullable'],
            'description_ua' => ['string', 'max:255', 'nullable'],
            'description_en' => ['string', 'max:255', 'nullable'],
            'text_ua' => ['string', 'nullable'],
            'text_en' => ['string', 'nullable'],
            'active' => ['nullable']
        ];
    }
}
