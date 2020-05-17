@extends('admin.home')

@section('page')

    <div class="card">
        <div class="card-header">
            Заказ №{{ $order->id }}
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Корзина</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach($order->products as $product)
                                <li class="list-group-item lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $product->model->name ?? '-' }}</h6>
                                    </div>
                                    <div>
                                        <p class="text-muted cart-item-description">{{ $product->type->translation ?? '' }}
                                            <br>
                                            <b>Штрихкод: </b>{{ $product->barcode }}
                                            <br>
                                            <b>Складской код: </b>{{ $product->stock_code }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-muted">&#8372; {{ $product->retail_price }} x {{ $product->getOriginal('pivot_quantity') ?? '-' }} = {{ $product->getOriginal('pivot_price') ?? '-' }}</span>
                                    </div>
                                    <input type="hidden" name="products[]" value="{{ $product->id }}">
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Итого (ГРН)</span>
                                <strong>&#8372; {{ $order->totalPrice ?? '0.00' }}</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Имя</label>
                                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="" value="{{ $order->name }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Фамилия</label>
                                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="" value="{{ $order->surname }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="{{ $order->email ?? '-' }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="address">Номер телефона</label>
                            <input type="text" name="phone" class="form-control" id="address" placeholder="+380(ХХ)ХХХ-ХХ-ХХ" value="{{ $order->phone }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Адрес</label>
                            <input type="text" name="address" class="form-control" id="address2" placeholder="Адрес" value="{{ $order->address }}" disabled>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="country">Страна</label>
                                <input type="text" name="country" class="form-control" id="address2" placeholder="Украина" value="{{ $order->country }}" disabled>
                                <input type="hidden" name="country" class="form-control" id="address2" value="Украина">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">Город</label>
                                <input type="text" name="city" class="form-control" id="address2" placeholder="Киев" value="{{ $order->city }}" disabled>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Метод доставки</label>
                                @switch($order->delivery_type_id)
                                    @case(1)
                                        <input class="form-control" type="text" value="Доставка по регионам (Новая Почта, Гюнсел и др.)" disabled>
                                    @break

                                    @case(2)
                                        <input class="form-control" type="text" value="Доставка по Киеву" disabled>
                                    @break

                                    @case(3)
                                        <input class="form-control" type="text" value="Установка на месте" disabled>
                                    @break

                                    @case(4)
                                        <input class="form-control" type="text" value="Самовывоз" disabled>
                                    @break

                                    @default
                                        <input class="form-control" type="text" value="Не указан" disabled>
                                @endswitch
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Метод оплаты</label>
                                @switch($order->delivery_type_id)
                                    @case(1)
                                    <input class="form-control" type="text" value="Наложенный платёж" disabled>
                                    @break

                                    @case(2)
                                    <input class="form-control" type="text" value="Наличные" disabled>
                                    @break

                                    @case(3)
                                    <input class="form-control" type="text" value="Предоплата" disabled>
                                    @break

                                    @default
                                    <input class="form-control" type="text" value="Не указан" disabled>
                                @endswitch
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="comment">Дополнительный комментарий</label>
                                <textarea disabled name="comment" class="form-control" id="comment" rows="5">{{ $order->comment ?? '-' }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" value="1" name="callback" type="radio" class="custom-control-input" checked disabled>
                                    <label class="custom-control-label" for="credit">
                                        @if($order->need_callback)
                                            Нужен обратный звонок менеджера
                                        @else
                                            Обратный звонок не нужен
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-6 mb-3">
                                <label for="state">Статус заказа</label>
                                <select name="orderStatus" class="custom-select d-block w-100" id="state" required>
                                    <option value="1" @if($order->status_id == 1) selected @endif>Новый</option>
                                    <option value="2" @if($order->status_id == 2) selected @endif>Выполнен</option>
                                    <option value="3" @if($order->status_id == 3) selected @endif>Подтверждён</option>
                                    <option value="4" @if($order->status_id == 4) selected @endif>Отменён</option>
                                </select>
                            </div>
                            <button class="btn btn-success btn-lg btn-block" type="submit">Обновить заказ</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>

@endsection
