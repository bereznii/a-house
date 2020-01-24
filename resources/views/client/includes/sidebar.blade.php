<div class="col-lg-3">

    <div class="form-group">
        <img style="width: 100%" src="{{ asset('storage/logo.png') }}" alt="logo">
    </div>

    <form action="{{ route('client.search') }}" method="GET">
        <div class="form-group">
            <div class="input-group">
                <input required type="text" name="query" placeholder="Поиск по еврокоду или сканкоду..." class="form-control" aria-label="Поиск" min="3" max="20">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary">Поиск</button>
                </div>
            </div>
        </div>
    </form>

    <hr>

    <form action="{{ route('client.filter') }}" method="GET">
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
    </form>

</div>
<!-- /.col-lg-3 -->
