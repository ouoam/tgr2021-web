<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Vuetify 2</title>

        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
@isset ($online)
        <meta http-equiv="refresh" content="20">
@endisset
    </head>
    <body>
@isset ($online)
        <iframe src="/chart" title="description" style="height:45vw;width:100%;"></iframe>
@endisset
        <div class="container">
            <div id="app">
@isset ($online)
                <div class="row">
                    <h1> Last 20 items
@if ($online)
                    <span class="badge badge-success">Online</span>
@else
                    <span class="badge badge-danger">Offline</span>
@endif
                    </h1>
                </div>
@endisset
                <div class="row">
                    @include('table', ['items' => $items])
                    @if (isset($items2))
                    @includeWhen(isset($items2), 'table', ['items' => $items2])
                    @endif
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
