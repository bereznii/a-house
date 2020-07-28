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
        </div>
    </div>
    <div class="card my-4 mb-1 catalog-item-card">
        <div class="card-body">
            <h3>
                {{ $product->type->translation ?? '' }} {{ $product->model->modelNameOption->model_name ?? '' }} ({{ $cyrillicModelName }})
                — несколько причин почему нужно купить автостекло именно в нашем интернет магазине.
            </h3>
            <p>
                Мы предлагаем автостекло и аксессуары высокого качества от лучших мировых производителей
                автомибильного стекла: Pilkington, Sekurit, Splintex, AGC, Autover, PGW и многих других! Подробнее
                ознакомиться можно по ссылке:
                <a href="http://markakachestva.ru/best-brands/1167-luchshie-proizvoditeli-lobovyh-stekol.html">
                    http://markakachestva.ru/best-brands/1167-luchshie-proizvoditeli-lobovyh-stekol.html
                </a>
            </p>
            <p>
                Найти и купить {{ $product->type->translation ?? '' }} на {{ $shortModelName }} в нашем интернет-магазине
                удобно и просто, перейдя в <a href="{{ route('new-client.catalog') }}">каталог</a>.
            </p>
            <p>
                Купив автостекло на {{ $product->make->name ?? '' }} ({{ $cyrillicModelName }}) у нас — Вы приобретаете
                высокое качество автостекла, качественный сервис и быстрое решение своей проблемы!
            </p>
            <p>
                В нашем интернет-магазине большой выбор автостекла для {{ $shortModelName }}: лобовое, боковое, заднее
                стекло, а также множество аксессуаров для качественной установки стекла, таких как: молдинги,
                уплотнители, клипсы и многое другое.
            </p>
            <p>
                У нас Вы сможете быстро найти нужное стекло на свой автомобиль {{ $shortModelName }}. Свяжитесь с нами
                по телефону или вайберу по номеру <a href="tel:+380986921349">+38 (098) 692 13 49</a>, либо по
                электронной почте <a href="mailto:autoglasshouse20@gmail.com">autoglasshouse20@gmail.com</a>. Так же Вы
                можете заказать обратный звонок, и мы Вам перезвоним в течении 15 минут. Мы гарантируем, что Вы сможете
                найти, купить, и установить нужное автостекло!
            </p>
            <p>
                Мы предоставляем услуги продажи, доставки и установки автостекла {{ $shortModelName }}!
                Продажа и установка с заменой возможна в городе Киев. В других регионах у нас есть партнёры, которые
                сделают качественную замену автостекла, любой сложности.
            </p>
            <p>
                Замена, установка автостекла на {{ $shortModelName }} ({{ $cyrillicModelName }}) в г.Киев
                возможна на нашем СТО, а также на выезде у клиента при определённых условиях.
            </p>
        </div>
    </div>
</div>
