<div class="col-lg-9">

    <div class="row my-4">

        @if(isset($products))
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('client.product.show', ['id' => $product->id]) }}">{{ $product->model->name ?? '' }},
                                    {{ mb_strtolower($product->type->translation ?? '') }}</a>
                            </h4>
                            <h5>{{ $product->retail_price ?? '' }}грн.</h5>
                            <p class="card-text">{{ $product->detailed_description ?? '' }}</p>
                            <h6><b>Еврокод:</b>  {{ $product->stock_code ?? '' }}</h6>
                            <h6><b>Производитель:</b> {{ $product->manufacture ?? '' }}</h6>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success btn-sm">Купить</button>
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-cart-plus"></i>
                                Добавить
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $products->links() }}
        @else
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title text-center mt-3">Воспользуйтесь фильтром или поиском, чтобы найти интересущее Вас стекло</p>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- /.row -->

</div>
<!-- /.col-lg-9 -->
