<section id="contact" class="contact">
    <div class="container">

        @if(strpos(url()->current(), 'contact') === false)
            <div class="section-title">
                <h2>Связаться с нами</h2>
                <p>Обращайтесь по любым вопросам! Поможем Вам подобрать любое стекло на любой автомобиль.</p>
            </div>
        @endif
        <div class="row">

            <div class="col-lg-5">
                <div class="info">
                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Электронная почта:</h4>
                        <p>autoglasshouse20@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Контактный номер:</h4>
                        <p>+38 (098) 692 13 49</p>
                    </div>

{{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>--}}
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="#" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Имя</label>
                            <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Номер телефона</label>
                            <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Текст обращения</label>
                        <textarea class="form-control" id="message" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button class="btn btn-success" type="submit">Отправить</button></div>
                </form>
            </div>

        </div>

    </div>
</section>
