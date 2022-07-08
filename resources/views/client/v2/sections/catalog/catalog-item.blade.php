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
      "description": "{{ $metaData['description'] ?? 'Інтернет-магазин Autoglass House' }}",
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
            <h3 style="font-size: 1.5rem;">{{ ceil($product->retail_price ?? 0) }} грн</h3>
            <hr>
            <h6><b>Тип:</b> {{ $product->type->code ?? '' }}</h6>
            <h6><b>Єврокод:</b> {{ $product->stock_code ?? '' }}</h6>
            <h6><b>Виробник:</b> {{ $product->manufacture ?? '' }}</h6>
            @if(isset($product->translated_description) || !empty(trim($product->detailed_description)))
                <h6><b>Опис:</b></h6>
                <p class="card-text">{{ $product->translated_description ?? '' }} {{ $product->detailed_description ?? '' }}</p>
            @endif
            <hr>
            <button class="btn btn-success addToCart-btn" data-productid="{{ $product->id }}">
                <i class="fas fa-cart-plus"></i>
                Додати до кошику
            </button>
        </div>
    </div>
    <div class="card my-4 mb-1 catalog-item-card">
        <div class="card-body">
            <h3>
                {{ $product->type->translation ?? '' }} {{ $product->model->modelNameOption->model_name ?? '' }} ({{ $cyrillicModelName }})
                — кілька причин чому потрібно купити автоскло саме в нашому інтернет-магазині.
            </h3>
            <p>
                Ми пропонуємо автоскло та аксесуари високої якості від найкращих світових виробників
                автомобільного скла: Pilkington, Sekurit, Splintex, AGC, Autover, PGW та багатьох інших!
            </p>
            <p>
                Знайти та купити {{ $product->type->translation ?? '' }} на {{ $shortModelName }} у нашому
                інтернет-магазині зручно і просто, перейшовши в <a href="{{ route('new-client.catalog') }}">каталог</a>.
            </p>
            <p>
                Купивши автоскло на {{ $product->make->name ?? '' }} ({{ $cyrillicModelName }}) у нас —
                Ви набуваєте високу якість автоскла, якісний сервіс та швидке вирішення своєї проблеми!
            </p>
            <p>
                У нашому інтернет-магазині великий вибір автоскла для {{ $shortModelName }}: лобове, бічне, заднє скло,
                а також безліч аксесуарів для якісної установки скла, таких як: молдинги, ущільнювачі, кліпси та багато іншого.
            </p>
            <p>
                У нас Ви зможете швидко знайти потрібне скло на свій автомобіль {{ $shortModelName }}. Зв'яжіться з нами
                за телефоном або у вайбері за номером <a href="tel:+380986921349">+38 (098) 692 13 49</a>, або
                електронною поштою <a href="mailto:autoglasshouse20@gmail.com">autoglasshouse20@gmail.com</a>. Також Ви
                можете замовити зворотній дзвінок, і ми Вам передзвонимо протягом 15 хвилин. Ми гарантуємо, що Ви
                зможете знайти, купити та встановити потрібне автоскло!
            </p>
            <p>
                Ми надаємо послуги продажу, доставки та встановлення автоскла {{ $shortModelName }}!
                Продаж та встановлення із заміною можливе у місті Києві. В інших регіонах у нас є партнери,
                які зроблять якісну заміну автоскла будь-якої складності.
            </p>
            <p>
                Заміна, встановлення автоскла на {{ $shortModelName }} ({{ $cyrillicModelName }}) у м.Київ можлива на
                нашому СТО, а також на виїзді у клієнта за певних умов.
            </p>
        </div>
    </div>
</div>
