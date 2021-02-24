<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Vuetify 2</title>

        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div id="app">
                <div class="row">
                    <find-form init_name='{{Request::input("name")}}' init_date_gt='{{Request::input("created_at.gt")}}' init_date_lt='{{Request::input("created_at.lt")}}' :kinds='@json($kinds, JSON_HEX_QUOT)'/>
                </div>

                <div class="row">
                    @include('table', ['items' => $items])
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
