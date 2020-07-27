<div class="col-lg-12">

    <div class="card mt-4 mb-4 cart-card">
        <div class="card-header">
            Оформление заказа
        </div>
        <form action="{{ route('new-client.checkout.order') }}" method="POST">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Корзина</span>
                        </h4>
                        @if($content['products']->isNotEmpty())
                            <ul class="list-group mb-3">
                                @foreach($content['products'] as $key => $product)
                                    <li class="list-group-item lh-condensed">
                                        <div class="text-right">
                                            <span><a href="{{ route('new-client.checkout.removeFromCart', ['id' => $product->id]) }}" class="text-danger"><i class="icofont-trash"></i></a></span>
                                        </div>
                                        <div>
                                            <h6 class="my-0"><a href="{{ route('new-client.product.show', ['id' => $product->id]) }}" target="_blank">{{ $product->model->name ?? '-' }}</a></h6>
                                            <p class="text-muted cart-item-description">{{ $product->type->translation ?? '' }}</p>
                                        </div>
                                        <div class="justify-content-end d-flex mb-1">
                                            <input type="text" class="form-control col-md-3 float-right quantity-input" data-productid="{{ $product->id }}" name="products[{{ $key }}][quantity]" value="{{ $content['quantities'][$product->id] ?? old('products')[$key]['quantity'] ?? 1 }}">
                                        </div>
                                        <div class="text-right">
                                            <span class="text-muted">&#8372; {{ $content['prices'][$product->id] ?? $product->retail_price }}</span>
                                        </div>
                                        <input type="hidden" name="products[{{ $key }}][product_id]" value="{{ $product->id }}">
                                        <input type="hidden" name="products[{{ $key }}][price]" value="{{ $content['prices'][$product->id] ?? old('products')[$key]['price'] ?? $product->retail_price }}">
                                    </li>
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Скидка</span>
                                    <strong><span class="text-success">-5%</span></strong>
                                </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                    <span>Итого (ГРН)</span>
                                    <strong> &#8372; {{ $content['totalPrice'] ?? '0.00' }}</strong>
                                </li>
                            </ul>
                            <small class="text-muted">* В случае необходимой замены стекла, скидка составляет 7% и оговаривается с менеджером.</small>
                        @endif

                    </div>
                    <div class="col-md-8 order-md-1">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Имя</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="" value="{{ old('firstName') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Фамилия</label>
                                <input type="text" name="surname" class="form-control" id="surname" placeholder="" value="{{ old('lastName') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Электронная почта <span class="text-muted">(Необязательно)</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="address@gmail.com" value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="address">Номер телефона</label>
                            <input type="text" name="phone" class="form-control" id="address" placeholder="+38 Телефон*" value="{{ old('phone') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Адрес</label>
                            <input type="text" name="address" class="form-control" id="address2" placeholder="Адрес" value="{{ old('address') }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="country">Страна</label>
                                <input type="text" name="country" class="form-control" id="address2" placeholder="Украина" value="Украина" required disabled>
                                <input type="hidden" name="country" class="form-control" id="address2" value="Украина">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">Город</label>
                                <input type="text" name="city" class="form-control" id="address2" placeholder="Киев" value="{{ old('city') }}" required>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="country">Метод доставки</label>
                                <select name="delivery_type_id" class="custom-select d-block w-100" id="country" required>
                                    <option value="2" @if(old('deliveryMethod') == 2) selected @endif>Доставка по Киеву</option>
                                    <option value="1" @if(old('deliveryMethod') == 1) selected @endif>Доставка по регионам (Новая Почта, Гюнсел и др.)</option>
                                    <option value="3" @if(old('deliveryMethod') == 3) selected @endif>Установка на месте</option>
                                    <option value="3" @if(old('deliveryMethod') == 4) selected @endif>Самовывоз</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">Метод оплаты</label>
                                <select name="payment_type_id" class="custom-select d-block w-100" id="state" required>
                                    <option value="1" @if(old('paymentMethod') == 1) selected @endif>Наложенный платёж</option>
                                    <option value="2" @if(old('paymentMethod') == 2) selected @endif>Наличные</option>
                                    <option value="3" @if(old('paymentMethod') == 3) selected @endif>На карту</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p class="text-muted">*При отправке стекла курьерской службой взимается предоплата в размере стоимости доставки в обе стороны.
                                    На случай если клиент отказался, передумал или указал неточный адрес.</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="comment">Дополнительный комментарий</label>
                                <textarea name="comment" class="form-control" id="comment" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" value="1" name="need_callback" type="radio" class="custom-control-input" checked disabled required>
                                    <label class="custom-control-label" for="credit">Запросить обратный звонок менеджера</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" value="0" name="need_callback" type="radio" class="custom-control-input" disabled required>
                                    <label class="custom-control-label" for="debit">Подтверждаю правильность заполненых данных</label>
                                </div>
                            </div>
                            <input type="hidden" name="need_callback" class="form-control" id="address2" value="1">
                        </div>
                        <hr class="mb-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button @if(!isset($content) || $content['products']->isEmpty()) disabled @endif class="btn btn-success btn-lg btn-block" type="submit">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
