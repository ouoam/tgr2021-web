<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }
    
    public function kind()
    {
        $items = Item::groupBy('name')->get('name');
        return Arr::pluck($items, 'name');
    }

    public function byName($name)
    {
        return Item::where('name', $name)->get();
    }

    public function push(Request $request)
    {
        $input = $request->all();
        $item = Item::create($input);
    }
}
