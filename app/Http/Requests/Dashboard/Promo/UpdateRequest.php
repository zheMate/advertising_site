<?php

namespace App\Http\Requests\Dashboard\Promo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            //todo:учитывай в валидации все аспекты своей системы, иначе будет 500 ошибка
            /*
             * Если на боевом проекте выполнив задачу по создании сущности выйдет 500 ошибка
             * Заказчик будет не в восторге от этого
             * Мысли шире
             */
            'title' => 'required|string',
            'description' => 'required|string',
            'contacts' => 'required|string',
            'price' => 'required|decimal:2',
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
