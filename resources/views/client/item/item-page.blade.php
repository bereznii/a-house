<div class="col-lg-9">

    <div class="card my-4 mb-5">
        <img class="card-img-top img-fluid item-img" src="{{ asset('storage/'. $product->type->code .'.png') }}" alt="{{ $product->model->name ?? '' }}, {{ mb_strtolower($product->type->translation ?? '') }}">
        <div class="card-body">
            <h3 class="card-title">{{ $product->model->name ?? '' }}</h3>
            <h4>{{ $product->type->translation ?? '' }}</h4>
            <h4>{{ $product->retail_price ?? '' }}грн.</h4>
            <hr>
            <h6><b>Тип:</b> {{ $product->type->code ?? '' }}</h6>
            <h6><b>Еврокод:</b> {{ $product->stock_code ?? '' }}</h6>
            <h6><b>Производитель:</b> {{ $product->manufacture ?? '' }}</h6>
            @if(isset($product->translated_description) || !empty(trim($product->detailed_description)))
                <h6><b>Описание:</b></h6>
                <p class="card-text">{{ $product->translated_description ?? '' }}{{ $product->detailed_description ?? '' }}</p>
            @endif
            <hr>
            <button class="btn btn-success addToCart-btn" data-productid="{{ $product->id }}">
                <i class="fas fa-cart-plus"></i>
                Добавить в корзину
            </button>
            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Заказать обратный звонок</button>
        </div>
    </div>
    <!-- /.card -->

</div>
<!-- /.col-lg-9 -->
