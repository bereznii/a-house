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
    <label for="makes">Марка:</label>
        <select name="makes" class="form-control" id="makes">
            @foreach($makes as $make)
                <option value="{{ $make->id }}">{{ $make->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="models">Модель:</label>
        <select disabled name="models" class="form-control" id="models">
        </select>
    </div>

    <div class="form-group">
        <label for="types">Тип стекла:</label>
        <select disabled name="types" class="form-control" id="types">
        </select>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-lg btn-block">Подобрать</button>
    </div>

</div>
<!-- /.col-lg-3 -->
