<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'slug' => 'nullable',
            'excerpt' => 'required|min:10',
            'body' =>  'required|min:10',
            'is_published' => 'nullable',
            'published_at' => 'nullable',
            'user_id' => 'nullable',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Пожалуйста введите заголовок',
            'title.min' => 'Заголовок слишком короткий.',
            'excerpt.required' => 'Пожалуйста введите краткое описание',
            'excerpt.min' => 'Краткое описание слишком короткое.',
            'body.required' => 'Пожалуйста введите текст статьи',
            'body.min' => 'Текст статьи слишком короткий.',
            'image.image' => 'Загруженный файл должен быть изображением.',
            'image.mimes' => 'Изображение должно быть в формате: jpeg, png, jpg, webp.',
            'image.max' => 'Изображение слишком большое.',
        ];
    }
}
