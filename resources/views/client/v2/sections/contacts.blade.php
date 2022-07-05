<section id="contact" class="contact">
    <div class="container">

        @if(strpos(url()->current(), 'contact') === false)
            <div class="section-title">
                <h2>ЗВ'ЯЗАТИСЯ З НАМИ</h2>
                <p>Звертайтесь з будь-яких питань! Допоможемо Вам підібрати будь-яке скло на будь-який автомобіль.</p>
            </div>
        @endif
        <div class="row">

            <div class="col-lg-5">
                <div class="info">
                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Електронна пошта:</h4>
                        <p>autoglasshouse20@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Контактний номер:</h4>
                        <p>
                            <i class="icofont-brand-viber no-back" style="color: #665CAC;"></i>
                             <i class="icofont-telegram no-back" style="color: #0088cc;"></i>
                             +38 (098) 692 13 49
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" id="formCard">
                <form action="#" class="php-email-form">
                    <div id="formFields">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Ім'я</label>
                                <input type="text" required name="callbackName" placeholder="Имя*" class="form-control" id="name"/>
                                <div class="validate"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Номер телефону</label>
                                <input type="text" required class="form-control" placeholder="+38 Телефон*" name="callbackPhone" id="phone"/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Текст звернення</label>
                            <textarea class="form-control" id="message" name="callbackComment" placeholder="Додатковий коментар..." rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Надсилання</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Ваше повідомлення було відправлене. Дякую!</div>
                        </div>
                        <div class="text-center"><button class="btn btn-success" id="sendCallbackRequest-btn" type="button">Надіслати</button></div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</section>
