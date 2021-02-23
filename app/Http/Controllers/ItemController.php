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
        return $items;
    }

    public function indexHTML()
    {
        $items = Item::all();
        return view('index', ["items" => $items]);
    }

    public function listLime()
    {
        $items = Item::where('name', 'lime')->get();
        return view('index', ["items" => $items]);
    }

    public function listNotLime()
    {
        $items = Item::where('name', '!=', 'lime')->get();
        return view('index', ["items" => $items]);
    }

    public function listCompare()
    {
        $items = Item::where('name', 'lime')->groupBy('name')->selectRaw('name, sum(qty) as qty')->get();
        $items2 = Item::where('name', '!=', 'lime')->groupBy('name')->selectRaw('name, sum(qty) as qty')->get();
        return view('index', ["items" => $items, "items2" => $items2]);
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
