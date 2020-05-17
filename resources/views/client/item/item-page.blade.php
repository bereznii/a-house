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

    <div class="card my-4 mb-1 border-success">
        <img class="card-img-top img-fluid item-img" src="{{ asset('storage/'. $product->type->code .'.png') }}" alt="{{ $product->model->name ?? '' }}, {{ mb_strtolower($product->type->translation ?? '') }}">
        <div class="card-body">
            <h1 class="card-title" style="font-size: 2rem;">{{ $product->model->name ?? '' }}</h1>
            <h2 style="font-size: 1.8rem;">{{ $product->type->translation ?? '' }}</h2>
            <h3 style="font-size: 1.5rem;">{{ $product->retail_price ?? '' }}грн.</h3>
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
    <div class="card my-1 mb-5 border-success">
        <div class="card-body">
            <h3>{{ $product->type->translation ?? '' }} {{ $product->model->modelNameOption->model_name ?? '' }} ({{ $cyrillicModelName }}) — несколько причин почему нужно купить автостекло именно в нашем интернет магазине.</h3>
            <p>
                Мы хотим предложить Вам автостекло и аксесуары высокого качества от лутших мировых производителей
                автомибильного стекла:Pilkington, Sekurit, Splintex, AGC, Autover, PGW и многих других!
                <a href="http://markakachestva.ru/best-brands/1167-luchshie-proizvoditeli-lobovyh-stekol.html">
                    http://markakachestva.ru/best-brands/1167-luchshie-proizvoditeli-lobovyh-stekol.html
                </a>
            </p>
            <p>
                {{ $product->type->translation ?? '' }} купить на {{ $shortModelName }} в нашем интернет магазине
                очень легко и удобно, в этом Вы можете убедиться сами перейдя в каталог нашего итернет сайта "autoglasshouse.com.ua".
            </p>
            <p>
                Купив автостекло на {{ $product->make->name ?? '' }} ({{ $cyrillicModelName }}) у нас — Вы приобретаете: высокое качество автостекла,
                качественный сервис, приятное и быстрое решение своей проблемы!
            </p>
            <p>
                В нашем интернет магазине очень большой выбор автостекла {{ $shortModelName }}
                : лобовое, боковое, заднее стекло, а также множество аксесуаров для качественной установки стекла, таких
                как: молдинги, уплотнители, клипсы и многое другое.
            </p>
            <p>
                У нас Вы быстро сможете найти и выбрать нужное стекло на свой автомобиль {{ $shortModelName }},
                а если не сможете найти интересующее Вас стекло, позвоните по номеру 098-692-13-49 или пишите —
                "autoglasshouse20@gmail.com" и мы с радостью поможем Вам сделать это! Подобрать, купить, доставить и
                установить нужное Вам автостекло.
            </p>
            <p>
                Мы предлагаем Вам услугу: продажа, доставка и установка автостекла {{ $shortModelName }}!
                Продажа и установка с заменой возможна в городе Киев. В других регионах у нас есть партнёры, которые
                сделают качественную замену автостекла, любой сложности, на вашем автомобиле!
            </p>
            <p>
                Замена, установка автостекла на {{ $shortModelName }} ({{ $cyrillicModelName }}) в г.Киев
                возможна на нашем СТО, а также на выезде у клиента при определённых условиях и возможностях.
            </p>
            <p>
                На многих новых и современных автомобилях стекло является не только как защита от внешней среды, а также
                как многофункциональное приспособление для облегчения, водителю, управления автомобилем. На очень
                большом количестве автостекол новых моделей авто есть дополнительные функции: обогрев всего стекла и/или
                зоны стеклоочестителей, многофункциональные камеры и датчики, и многое другое.
            </p>
            <p>
                Иногда подобрать и купить нужное автостекло очень сложно, мы, с нашим опытом, поможем Вам справиться с
                этой задачей. Звоните по номеру 098-692-13-49 или пишите — "autoglasshouse20@gmail.com", и мы Вам поможем
                сделать это. Подберём, продадим, доставим и установим автостекло, любой сложности, на Ваше авто.
            </p>
        </div>
    </div>
    <!-- /.card -->

</div>
<!-- /.col-lg-9 -->
