<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class ItemControler extends Controller
{
    public function kind()
    {
        $item = Item::groupBy('name')-get();
        return response()->json($item);
    }
}
