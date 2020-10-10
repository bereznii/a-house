<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'delivery_type_id' => 'required|integer',
            'payment_type_id' => 'required|integer',
            'need_callback' => 'required|integer',
            'comment' => 'max:10000',
            'products' => 'required',
            'products.*.product_id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer',
            'products.*.price' => 'required|numeric|lte:1000000',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Имя является обязательным полем',
            'name.min' => 'Имя должно состоять минимум из 2 символов',
            'name.max' => 'Имя должно состоять максимум из 255 символов',
            'surname.required' => 'Фимилия является обязательным полем',
            'surname.min' => 'Фимилия должно состоять минимум из 2 символов',
            'surname.max' => 'Фимилия должно состоять максимум из 255 символов',
            'phone.required' => 'Номер телефона является обязательным полем',
            'phone.max' => 'Номер телефона должен состоять максимум из 255 символов',
            'email.required' => 'Электронная почта является обязательным полем',
            'email.max' => 'Электронная почта должна состоять максимум из 255 символов',
            'email.email' => 'Электронная почта должна состоять максимум из 255 символов',
            'address.required' => 'Адрес является обязательным полем',
            'address.email' => 'Адрес должен состоять максимум из 255 символов',
            'country.required' => 'Страна является обязательным полем',
            'country.email' => 'Страна должна состоять максимум из 255 символов',
            'city.required' => 'Город является обязательным полем',
            'city.email' => 'Город должен состоять максимум из 255 символов',
            'delivery_type_id.required' => 'Метод доставки является обязательным полем',
            'payment_type_id.required' => 'Метод оплаты является обязательным полем',
            'need_callback.required' => 'Обратный звонок является обязательным полем',
            'comment.max' => 'Комментарий должно состоять максимум из 10000 символов',
            'products.required' => 'В корзине нет товаров',
            'products.*.product_id.required' => 'Товар является обязательным полем',
            'products.*.product_id.exists' => 'Товара с таким идентификатором не существует',
            'products.*.quantity.integer' => 'Количество товара должно быть числом',
            'products.*.price.required' => 'Цена товара является обязательным полем',
            'products.*.price.numeric' => 'Цена товара является обязательным полем',
            'products.*.price.lte' => 'Цена на товар не является валидной'
        ];
    }
}
