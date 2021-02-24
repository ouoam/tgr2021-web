<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return $items;
    }

    public function indexHTML()
    {
        $items = Item::orderByDesc('created_at')->limit(30)->get();
        $online = $this->online();
        return view('index', ["items" => $items, "online" => $online]);
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
        if ($request->has('type')) {
            $input = $request->input('type');
            $input2 = $request->input('size');
            $item = Item::create(['name' => $input, 'size' => $input2]);
        }

        if ($request->has('file')) {
            $line_api = 'https://notify-api.line.me/api/notify';
            $access_token = 'rtUIYkXdkaMh10jdhYP3SzEf03T8BFTcfjIrfVrSgzZ';
            $message = 'Found small lime';

            $imageFile = $request->file('file');
            $fileName = time().'_'.$request->file->getClientOriginalName();

            $response = Http::attach('imageFile', file_get_contents($imageFile), $fileName)
                ->withToken($access_token)
                ->post($line_api, ['message' => $message]);
        }
        
        return ["ok"];
    }

    public function chart(Request $request)
    {
        $init = Item::selectRaw('`created_at` as x')->selectRaw('count(*) as y')
        ->groupByRaw('UNIX_TIMESTAMP(x) DIV 60')->orderBy('x');
        $pingpong = $init->where('name', 'pingpong')->get();

        $init2 = Item::selectRaw('`created_at` as x')->selectRaw('count(*) as y')
        ->groupByRaw('UNIX_TIMESTAMP(x) DIV 60')->orderBy('x');
        $normal = $init2->where('name', 'lime_normal')->get();

        $init3 = Item::selectRaw('`created_at` as x')->selectRaw('count(*) as y')
        ->groupByRaw('UNIX_TIMESTAMP(x) DIV 60')->orderBy('x');
        $small = $init3->where('name', 'lime_small')->get();
        
        return view('chart', ["pingpong" => $pingpong, 'normal' => $normal, 'small' => $small]);

        //return response()->json($list);
    }

    public function hb()
    {
        $content = Carbon::now()->timestamp;

        Storage::put('last.txt', $content);

        return $content;
    }

    public function online()
    {
        if (Storage::exists('last.txt')) {
            $last = intval(Storage::get('last.txt'));
            $now = intval(Carbon::now()->timestamp);

            return $last + 60 >= $now;
        }

        return -1;
    }
}
