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
            'firstName' => 'required|min:2|max:255',
            'lastName' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'deliveryMethod' => 'required|integer',
            'paymentMethod' => 'required|integer',
            'callback' => 'required|integer',
            'products.*.product_id' => 'required|integer',
            'products.*.quantity' => 'required|integer',
            'products.*.price' => 'required|numeric',
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
            'firstName.required' => 'Имя является обязательным полем',
            'firstName.min' => 'Имя должно состоять минимум из 2 символов',
            'firstName.max' => 'Имя должно состоять максимум из 255 символов',
            'lastName.required' => 'Фимилия является обязательным полем',
            'lastName.min' => 'Фимилия должно состоять минимум из 2 символов',
            'lastName.max' => 'Фимилия должно состоять максимум из 255 символов',
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
            'deliveryMethod.required' => 'Метод доставки является обязательным полем',
            'paymentMethod.required' => 'Метод оплаты является обязательным полем',
            'callback.required' => 'Обратный звонок является обязательным полем',
            'products.*.product_id.required' => 'Товар является обязательным полем',
            'products.*.quantity.integer' => 'Количество товара должно быть числом',
            'products.*.price.required' => 'Цена товара является обязательным полем',
            'products.*.price.numeric' => 'Цена товара является обязательным полем',
        ];
    }
}
