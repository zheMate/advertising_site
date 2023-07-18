<?php

namespace App\Http\Requests\Dashboard\Promo;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //todo: не учел максимальное количество знаков или максимальное значение
            /*
             * Если я укажу длинное название при создании/редактировании товара
             * то у тебя вылетит 500 ошибка, а должна пройти валидация
             */
            'title' => 'required|string',
            'description' => 'required|string',
            'contacts' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:Активна,Неактивна'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" необходимо для заполнения',
            'title.string' => 'Только алфавит кириллицы или латиницы',
            'description.required' => 'Поле "Описание" необходимо для заполнения',
            'description.string' => 'Только алфавит кириллицы или латиницы',
            'contacts.required' => 'Поле "Контакты для связи" необходимо для заполнения',
            'contacts.string' => 'Только алфавит кириллицы или латиницы',
            'price.required' => 'Поле "Цена" необходимо для заполнения',
            'price.string' => 'Только алфавит кириллицы или латиницы',
            'category_id.required' => 'Поле "Категория" необходимо для заполнения',
            'category_id.integer' => 'Id категории должно быть числом',
            'category_id.exists' => 'Id категории должен быть в БД',
            'status.required' => 'Поле "Статус" необходимо для заполнения',
            'status.in' => 'Статус имеет всего несколько значений: Активна, Неактивна'
        ];
    }
}
