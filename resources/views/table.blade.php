<table class="table col-sm">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">qty</th>
            
            @if (isset($items[0]) && $items[0]->created_at)
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
        <tr>
            <td>No results</td>
            <td></td>
            <td></td>
        </tr>
@endforelse

    <tr class="bg-info">
    <td><b>Sum</b></td>
    <td><b>{{$count}}</b></td>
    <td></td>
    </tr>
    </tbody>
</table>