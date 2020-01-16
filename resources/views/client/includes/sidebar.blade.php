<div class="col-lg-3">

    <div class="form-group">
        <img style="width: 100%" src="{{ asset('storage/logo.png') }}" alt="logo">
    </div>

    <div class="form-group">
        <div class="input-group">
            <input type="text" placeholder="..." class="form-control" aria-label="Поиск">
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary">Поиск</button>
                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Поиск по еврокоду</a>
                    <a class="dropdown-item" href="#">Поиск по сканкоду</a>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="form-group">
    <label for="exampleFormControlSelect2">Марка:</label>
        <select class="form-control" id="exampleFormControlSelect2">
            <option>BMW</option>
            <option>Audi</option>
            <option>Mercedes</option>
            <option>Renault</option>
            <option>Skoda</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Модель:</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>M5 E60</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect3">Тип стекла:</label>
        <select class="form-control" id="exampleFormControlSelect3">
            <option>Лобовое</option>
            <option>Заднее</option>
            <option>Правое переднее</option>
            <option>Правое заднее</option>
            <option>Левое переднее</option>
            <option>Левое заднее</option>
            <option>Заднее</option>
        </select>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-lg btn-block">Подобрать</button>
    </div>

</div>
<!-- /.col-lg-3 -->