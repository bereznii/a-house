<div class="col-lg-9">

    <div class="card mt-4">
        <div class="card-header">
            Оформление заказа
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-md-8 order-md-1">
                <form action="{{ route('client.checkout.order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Имя</label>
                            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Фамилия</label>
                            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Номер телефона</label>
                        <input type="text" name="phone" class="form-control" id="address" placeholder="+380(ХХ)ХХХ-ХХ-ХХ" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Адрес</label>
                        <input type="text" name="address" class="form-control" id="address2" placeholder="Apartment or suite" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="country">Страна</label>
                            <input type="text" name="country" class="form-control" id="address2" placeholder="Украина" required>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="state">Город</label>
                            <input type="text" name="city" class="form-control" id="address2" placeholder="Киев" required>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="country">Метод доставки</label>
                            <select name="deliveryMethod" class="custom-select d-block w-100" id="country" required>
                                <option value="1">Новая почта</option>
                                <option value="2">Курьер</option>
                                <option value="3">Установка на месте</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="state">Метод оплаты</label>
                            <select name="paymentMethod" class="custom-select d-block w-100" id="state" required>
                                <option value="1">Наложенный платёж</option>
                                <option value="2">Наличные</option>
                                <option value="3">Предоплата</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" value="1" name="callback" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Запросить обратный звонок менеджера</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" value="0" name="callback" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Подтверждаю правильность заполненых данных</label>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <button class="btn btn-success btn-lg btn-block" type="submit">Оформить заказ</button>
                </form>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Корзина</span>
                </h4>
                @if(isset($content))
                    <ul class="list-group mb-3">
                        @foreach($content['products'] as $product)
                        <li class="list-group-item lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $product->model->name ?? '-' }}</h6>
                                    <p class="text-muted cart-item-description">{{ $product->type->translation }}</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-muted">&#8372; {{ $product->retail_price }}</span>
                                </div>

                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Итого (ГРН)</span>
                            <strong>&#8372; {{ $content['totalPrice'] ?? '0.00' }}</strong>
                        </li>
                    </ul>
                @endif

            </div>
        </div>
        </div>

    </div>

</div>
