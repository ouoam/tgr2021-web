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
            <table class="table col-sm">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">qty</th>
                        
                        @if ($items[0]->created_at)
                        <th scope="col">create</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
@php
    $count = 0;
@endphp
@forelse ($items as $item)
@php
    $count += $item->qty;
@endphp
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->qty}}</td>
                                @if ($item->created_at)
                                <td>{{$item->created_at}}</td>
                                @endif
                            </tr>
                @empty
                    <p>No users</p>
                @endforelse

                <tr class="bg-info">
                <td><b>Sum</b></td>
                <td><b>{{$count}}</b></td>
                <td></td>
                </tr>
                </tbody>
            </table>
            @if (isset($items2))
            <table class="table col-sm">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">qty</th>
                        @if ($items2[0]->created_at)
                        <th scope="col">create</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
@php
    $count = 0;
@endphp
@forelse ($items2 as $item)
@php
    $count += $item->qty;
@endphp
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->qty}}</td>
                                @if ($item->created_at)
                                <td>{{$item->created_at}}</td>
                                @endif
                            </tr>
                @empty
                    <p>No users</p>
                @endforelse
                <tr class="bg-info">
                <td><b>Sum</b></td>
                <td><b>{{$count}}</b></td>
                <td></td>
                </tr>
                </tbody>
            </table>
            @endif
        </div>
</div>
</div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
