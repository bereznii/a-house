<div class="col-lg-3 my-4">

    <form action="{{ route('client.search') }}" method="GET">
        <div class="form-group">
            <div class="input-group">
                <input required type="text" value="{{ old('query') }}" name="query" id="search_input" placeholder="Поиск по еврокоду..." class="form-control" aria-label="Поиск" maxlength="20">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success">Поиск</button>
                </div>
            </div>
        </div>
    </form>

    <hr>

    <form action="{{ route('client.filter') }}" method="GET">
        <div class="form-group">
            <label for="makes">Марка:</label>
            <select name="makes" class="form-control" id="makes">
                @foreach($sidebarData['makes']['list'] as $make)
                    <option value="{{ $make->id }}" @if($sidebarData['makes']['selectedId'] == $make->id) selected @endif>{{ $make->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="models">Модель:</label>
            <select @if(!isset($sidebarData['models']['list'])) disabled @endif name="models" class="form-control" id="models">
                @if(isset($sidebarData['models']['list']))
                    <option value=''>Модель автомобиля</option>
                    @foreach($sidebarData['models']['list'] as $model)
                        <option value="{{ $model->id }}" @if($sidebarData['models']['selectedId'] == $model->id) selected @endif>{{ $model->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="types">Тип стекла:</label>
            <select @if(!isset($sidebarData['types']['list']) || empty($sidebarData['models']['selectedId'])) disabled @endif name="types" class="form-control" id="types">
                @if(isset($sidebarData['types']['list']) && !empty($sidebarData['models']['selectedId']))
                    <option value=''>Тип стекла</option>
                    @foreach($sidebarData['types']['list'] as $type)
                        <option value="{{ $type->id }}" @if($sidebarData['types']['selectedId'] == $type->id) selected @endif>{{ $type->translation ?? '' }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-success btn-lg btn-block">Подобрать</button>
        </div>
    </form>

</div>
<!-- /.col-lg-3 -->
