<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
    	$inventories = DB::table('inventory')->get();
    	return view('welcome')->with('inventories', $inventories);
    }
    public function store(Inventory $inventories)
    {
        $inventory = new Inventory;
        $inventory->name = request()->name;
        $inventory->quantity = request()->quantity;
        $inventory->category = request()->category;
        $inventory->save();
    	return $inventory;
    }
}
