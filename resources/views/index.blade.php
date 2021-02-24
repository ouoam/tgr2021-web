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

@if (isset($online))
<div id="app" class="container-fluid">
@else
<div id="app" class="container">
@endif
    <div class="row">
@isset ($online)
        <iframe class="col-8" src="/chart" title="description" style="height:100vh;width:100vw;"></iframe>
@endisset
        <div class="col container">
@isset ($online)
            <div class="row">
                <div class="col">
                    <h1> Last 20 items
    @if ($online)
                        <span class="badge badge-success">Online</span>
    @else
                        <span class="badge badge-danger">Offline</span>
    @endif
                    </h1>
                </div>
                <div>
                    <h4>
                        <a href="/auth/login" class="badge badge-primary">Login</a>
                        <a href="/users" class="badge badge-info">Manage</a>
                    </h4>
                </div>
            </div>
@endisset
            <div class="row" style="height:90vh;overflow:auto;">
                @include('table', ['items' => $items])
                @if (isset($items2))
                @includeWhen(isset($items2), 'table', ['items' => $items2])
                @endif
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
