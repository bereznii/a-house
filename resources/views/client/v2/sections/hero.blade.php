<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url({{ asset('landing_img/hero/header11.jpg') }}">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Вас приветствует
                            <span> Autoglass House</span>, интернет-магазин автомобильного стекла
                        </h2>
                        <p class="animate__animated animate__fadeInUp">Мы предлагаем качественное автостекло
                            с Европы и отменный отечественный сервис. Больше 250 клиентов в месяц, 4500 позиций
                            лобового, заднего, бокового стекла и аксессуаров для монтажа в наличии.
                            <br>
                            Для удобного подбора предлагаем наш онлайн-каталог.
                        </p>
                        <a href="{{ route('new-client.catalog') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Перейти в каталог</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url({{ asset('landing_img/hero/header2.jpg') }})">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">При оформлении заказа на сайте -5%</h2>
                        <p class="animate__animated animate__fadeInUp">При оформлении заказа на покупку стекла онлайн на
                            сайте Вас ждёт скидка 5%, и при дополнительном оформлении замены стекла (работа по установке),
                            скидка 7% на всю сумму (стекло + работа)!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url({{ asset('landing_img/hero/header3.jpg') }}">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Помощь в подборе по фото</h2>
                        <p class="animate__animated animate__fadeInUp">Современное автостекло часто имеет много
                            функций. Вы можете сделать несколько фотографий стекла Вашего авто с нескольких ракурсов и
                            мы сможем помочь в подборе подходящего.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Предыдущий</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Следующий</span>
        </a>

    </div>
</section>
