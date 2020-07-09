@extends('admin.home')

@section('page')

<div class="card">
    <div class="card-header">
        Каталог для autopro
    </div>
    <div class="card-body">
        <form action="{{ route('home.download-autopro') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportType" id="exampleRadios1" value="all_products" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Весь каталог
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportType" id="exampleRadios2" value="only_original_products">
                        <label class="form-check-label" for="exampleRadios2">
                            Только позиции с оригинальными кодами
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportType" id="exampleRadios3" value="specific_make_products">
                        <label class="form-check-label" for="exampleRadios3">
                            Позиции конкретной марки
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Выбрать марку  для экспорта</label>
                        <select class="form-control" name="make[]" id="exampleFormControlSelect2" multiple size="20">
                            @foreach($makes as $key => $make)
                                <option value="{{ $key }}">{{ $make }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-12 col-sm-12">
                    <button type="submit" class="btn btn-success">Экспортировать каталог</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
