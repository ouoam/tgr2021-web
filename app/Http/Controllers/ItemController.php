<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
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
        $items = Item::where('name', 'lime')->groupBy('name')->selectRaw('name, count(*) as qty')->get();
        return view('index', ["items" => $items]);
    }

    public function listNotLime()
    {
        $items = Item::where('name', '!=', 'lime')->groupBy('name')->selectRaw('name, count(*) as qty')->get();
        return view('index', ["items" => $items]);
    }

    public function listCompare()
    {
        $items = Item::where('name', 'lime')->groupBy('name')->selectRaw('name, count(*) as qty')->get();
        $items2 = Item::where('name', '!=', 'lime')->groupBy('name')->selectRaw('name, count(*) as qty')->get();
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

    public function find(Request $request)
    {
        DB::enableQueryLog();
        $item = DB::table('items');

        if ($request->input('name')) {
            $item->where('name', $request->input('name'));
        }

        if ($request->input('created_at.lt') && $request->input('created_at.gt')) {
            $item->whereBetween('created_at', [$request->input('created_at.gt'), $request->input('created_at.lt')]);
        } else if ($request->input('created_at.lt')) {
            $item->where('created_at', '<', $request->input('created_at'));
        } else if ($request->input('created_at.gt')) {
            $item->where('created_at', '>', $request->input('created_at'));
        }

        return $item->get();
    }

    public function findHTML(Request $request)
    {
        $items = $this->find($request);
        $kinds = Arr::pluck(Item::groupBy('name')->get('name'), 'name');
        return view('find', ["items" => $items, "kinds" => $kinds]);
    }

    public function rpi(Request $request)
    {
        $input = $request->all();
        $item = Item::create($input);
    }
}
