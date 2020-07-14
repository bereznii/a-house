<div class="col-lg-9">

    <script type="application/ld+json">
    {
     "@context": "http://schema.org",
     "@type": "BreadcrumbList",
     "itemListElement":
     [
      {
       "@type": "ListItem",
       "position": 1,
       "item":
       {
        "@id": "https://autoglasshouse.com.ua/filter?makes={{ $product->make_id ?? '' }}",
        "name": "{{ $product->make->name ?? '' }}"
        }
      },
      {
       "@type": "ListItem",
      "position": 2,
      "item":
       {
         "@id": "https://autoglasshouse.com.ua/filter?makes={{ $product->make_id ?? '' }}&models={{ $product->model_id ?? '' }}",
         "name": "{{ $product->model->name ?? '' }}"
       }
      },
      {
       "@type": "ListItem",
      "position": 3,
      "item":
       {
         "@id": "https://autoglasshouse.com.ua/filter?makes={{ $product->make_id ?? '' }}&models={{ $product->model_id ?? '' }}&types={{ $product->type_id ?? '' }}",
         "name": "{{ $product->type->translation ?? '' }}"
       }
      }
     ]
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "{{ $product->type->translation ?? '' }} на {{ $product->model->name }}",
      "image": "{{ asset('storage/'. $product->type->code .'.png') }}",
      "description": "{{ $metaData['description'] ?? 'Интернет-магазин Autoglass House' }}",
      "brand": {
        "@type": "Thing",
        "name": "{{ $product->manufacture }}"
      },
      "sku": "{{ $product->stock_code ?? '' }}",
      "url": "{{ url()->current() }}",
      "offers": {
        "@type": "Offer",
        "priceCurrency": "UAH",
        "price": "{{ $product->retail_price }}",
        "itemCondition": "http://schema.org/UsedCondition",
        "availability": "http://schema.org/InStock",
        "priceValidUntil": "{{ now()->addMonths(1) }}",
        "url": "{{ url()->current() }}",
        "seller": {
          "@type": "Organization",
          "name": "Autoglass House"
        }
      }
    }
    </script>

    <div class="card my-4 mb-1 catalog-item-card">
        <img class="card-img-top img-fluid item-img" src="{{ asset('storage/'. $product->type->code .'.png') }}" alt="{{ $product->model->name ?? '' }}, {{ mb_strtolower($product->type->translation ?? '') }}">
        <div class="card-body">
            <h1 class="card-title" style="font-size: 2rem;">{{ $product->model->name ?? '' }}</h1>
            <h2 style="font-size: 1.8rem;">{{ $product->type->translation ?? '' }}</h2>
            <h3 style="font-size: 1.5rem;">{{ $product->retail_price ?? '' }} грн</h3>
            <hr>
            <h6><b>Тип:</b> {{ $product->type->code ?? '' }}</h6>
            <h6><b>Еврокод:</b> {{ $product->stock_code ?? '' }}</h6>
            <h6><b>Производитель:</b> {{ $product->manufacture ?? '' }}</h6>
            @if(isset($product->translated_description) || !empty(trim($product->detailed_description)))
                <h6><b>Описание:</b></h6>
                <p class="card-text">{{ $product->translated_description ?? '' }} {{ $product->detailed_description ?? '' }}</p>
            @endif
            <hr>
            <button class="btn btn-success addToCart-btn" data-productid="{{ $product->id }}">
                <i class="fas fa-cart-plus"></i>
                Добавить в корзину
            </button>
            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Заказать обратный звонок</button>
        </div>
    </div>
</div>
