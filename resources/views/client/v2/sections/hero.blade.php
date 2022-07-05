<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url({{ asset('landing_img/hero/header11.jpg') }}">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Вас вітає
                            <span> Autoglass House</span>, <br> інтернет-магазин з продажу автомобільного скла
                        </h2>
                        <p class="animate__animated animate__fadeInUp">Ми пропонуємо якісне автоскло
                            з Європи та відмінний вітчизняний сервіс. Більше 250 клієнтів на місяць, 4500 позицій
                            лобового, заднього, бокового скла та аксесуарів для монтажу в наявності.
                            <br>
                            Для зручного підбору пропонуємо наш онлайн-каталог.
                        </p>
                        <a href="{{ route('new-client.catalog') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Перейти до каталогу</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url({{ asset('landing_img/hero/header2.jpg') }})">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">При оформленні замовлення на сайті -3%</h2>
                        <p class="animate__animated animate__fadeInUp">При оформленні замовлення
                            на сайті на Вас чекає знижка 3%, і при додатковому оформленні заміни скла (робота
                            з заміни), знижка 5% на всю суму (скло + робота)!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url({{ asset('landing_img/hero/header3.jpg') }}">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Допомога у підборі по фото</h2>
                        <p class="animate__animated animate__fadeInUp">Сучасне автоскло часто має багато функцій.
                            Ви можете зробити кілька фотографій скла Вашого авто з кількох ракурсів,
                            і ми зможемо допомогти у підборі відповідного.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Попередній</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Наступний</span>
        </a>

    </div>
</section>
