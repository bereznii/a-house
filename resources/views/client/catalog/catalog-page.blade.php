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
                "url": "https://autoglasshouse.com.ua/automotive/{{ $product->id }}",
                "item": {
                  "@context": "https://schema.org/",
                  "@type": "Product",
                  "name": "{{ $product->type->translation }} для {{ $product->model->name }}",
                  "image": "{{ asset('storage/'. $product->type->code .'.png') }}",
                  "description": "{{ $product->translated_description ?? '' }}{{ $product->detailed_description ?? '' }}.",
                  "url": "{{ url()->current() }}#{{ $product->id }}",
                  "brand": {
                    "@type": "Thing",
                    "name": "{{ $product->manufacture }}"
                  },
                  "offers": {
                    "@type": "Offer",
                    "priceCurrency": "UAH",
                    "price": "{{ $product->retail_price }}",
                    "itemCondition": "http://schema.org/UsedCondition",
                    "availability": "http://schema.org/InStock",
                    "seller": {
                      "@type": "Organization",
                      "name": "Autoglass House"
                    }
                  }
                }
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
                    <div class="card h-100 item-card" id="{{ $product->id }}">
                        <a href="{{ route('client.product.show', ['id' => $product->id]) }}"><img class="card-img-top" src="{{ asset('storage/'. $product->type->code .'.png') }}" alt="{{ $product->model->name ?? '' }}, {{ mb_strtolower($product->type->translation ?? '') }}"></a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('client.product.show', ['id' => $product->id]) }}">{{ $product->model->name ?? '' }} |
                                    {{ mb_strtolower($product->type->translation ?? '') }}</a>
                            </h5>
                            <h5>{{ $product->retail_price ?? '' }}грн.</h5>
                            <p class="card-text">{{ $product->detailed_description ?? '' }}</p>
                            <h6><b>Еврокод:</b>  {{ $product->stock_code ?? '' }}</h6>
                            <h6><b>Производитель:</b> {{ $product->manufacture ?? '' }}</h6>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success btn-sm addToCart-btn" data-productid="{{ $product->id }}">
                                <i class="fas fa-cart-plus"></i>
                                Добавить
                            </button>
                            <button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#exampleModal">
                                Перезвонить
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
