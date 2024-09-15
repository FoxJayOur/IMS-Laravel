<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FinishedGoods;
use Illuminate\Http\Request;

class FinishedGoodsController extends Controller
{
    public function index() {
        return view('inventory.index');
    }
 
    public function create() {
        return view('inventory.finishedgoods');
    }

    public function view() {
        $finishedgoods = FinishedGoods::all();
        return view('inventory.view.finishedgoods', ['finishedgoods' => $finishedgoods]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'item_name'=> 'required',
            'qty'=> 'required|numeric',
            'description'=> 'required',
            'sku'=> 'required',
            'total_sold'=> 'required',
            'cost'=> 'required|decimal:0,4',
        ]);

        $newInventory = FinishedGoods::create($data);

        return redirect()->route('inventory')->with('success','Item was stored in inventory');
    }

    public function update(FinishedGoods $finishedgood) {
        
        return view('inventory.update.finishedgoods', ['finishedgood'=>$finishedgood]);
        
    }

    public function save(FinishedGoods $finishedgood, Request $request) {
        $data = $request->validate([
            'item_name'=> 'required',
            'qty'=> 'required|numeric',
            'description'=> 'required',
            'sku'=> 'required',
            'total_sold'=> 'required',
            'cost'=> 'required|decimal:0,4',
        ]);

        $finishedgood->update($data);

        return redirect()->route('finishedGoodsView')->with('success','Updated Successfully');
    }
    
    public function delete(FinishedGoods $finishedgood) {
        $finishedgood->delete();

        return redirect()->route('finishedGoodsView')->with('delete','Successfully Deleted');
    }
}
