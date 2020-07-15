<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>{{ $pageData['breadcrumbs']['title'] }}</h2>
            <ol>
                <li><a href="{{ route('new-client.landing') }}">Главная</a></li>
                <li>{{ $pageData['breadcrumbs']['title'] }}</li>
            </ol>
        </div>

    </div>
</section>
