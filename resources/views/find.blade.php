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
                    <form class="form-inline" method="get" id="myForm">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <select class="form-control" id="name" name="name">
                                <option value=""></option>
                                @foreach ($kinds as $kind)
                                @if (Request::input('name') == $kind)
                                <option value="{{$kind}}" selected>{{$kind}}</option>
                                @else
                                <option value="{{$kind}}">{{$kind}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="qty" value="{{Request::input('qty')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="row">
                    @include('table', ['items' => $items])
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
