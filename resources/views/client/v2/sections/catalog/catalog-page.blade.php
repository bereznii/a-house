<div class="col-lg-9">

    @if(isset($products))
    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "ItemList",
        "url": "{{ url()->current() }}",
        "numberOfItems": "{{ $products->count() }}",
        "itemListElement": [
        @foreach ($products as $key => $product)
            {
                "@type": "ListItem",
                "position": {{ $key+1 }},
                "url": "https://autoglasshouse.com.ua/automotive/{{ $product->id }}"
            }
            @if($key != $products->count()-1)
            ,
            @endif
        @endforeach
        ]
    }
    </script>
    @endif

    <div class="row my-4">
        @if(isset($products))
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 item-card shadow" id="{{ $product->id }}">
                        <a href="{{ route('new-client.product.show', ['id' => $product->id]) }}">
                            <img class="card-img-top"
                                 src="{{ asset('storage/'. $product->type->code .'.png') }}"
                                 alt="{{ $product->model->name ?? '' }}, {{ mb_strtolower($product->type->translation ?? '') }}"
                            >
                        </a>
                        <div class="card-body">
                            <h3 class="card-title" style="font-size: 0.9rem;">
                                <a href="{{ route('new-client.product.show', ['id' => $product->id]) }}">
                                    {{ $product->model->name ?? '' }} | {{ mb_strtolower($product->type->translation ?? '') }}
                                </a>
                            </h3>
                            <h5>{{ ceil($product->retail_price ?? 0) }} грн</h5>
                            <p class="card-text">{{ $product->detailed_description ?? '' }}</p>
                            <h6 style="font-size: 0.9rem;"><b>Єврокод:</b>  {{ $product->stock_code ?? '' }}</h6>
                            <h6 style="font-size: 0.9rem;"><b>Артикул:</b>  {{ $product->vendor_code ?? '' }}</h6>
                            <h6 style="font-size: 0.9rem;"><b>Виробник:</b> {{ $product->manufacture ?? '' }}</h6>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success btn-sm addToCart-btn" data-toggle="modal" data-target=".bd-example-modal-sm" data-productid="{{ $product->id }}">
                                <i class="fas fa-cart-plus"></i>
                                Додати
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 col-sm-12">
                {{ $products->onEachSide(1)->links() }}
            </div>
        @else
            <div class="col-lg-12 contact">
                <div class="info">
                    <p class="card-title text-center p-0 m-0" style="font-size: 1.1em;">Скористайтеся фільтром або пошуком, щоб знайти потрібне скло</p>
                </div>
            </div>
        @endif

    </div>
    <!-- /.row -->

</div>
<!-- /.col-lg-9 -->
