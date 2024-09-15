<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplies;
use Illuminate\Http\Request;

class SuppliesController extends Controller
{
    public function index() {
        return view('inventory.index');
    }
 
    public function create() {
        return view('inventory.supplies');
    }

    public function view() {
        $supplies = Supplies::all();
        return view('inventory.view.supplies', ['supplies' => $supplies]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'item_name'=> 'required',
            'qty'=> 'required|numeric',
            'description'=> 'required',
            'usage_rates'=> 'required',
            'cost'=> 'required|decimal:0,4',
            'storage_requirements'=> 'required',
        ]);

        $newInventory = Supplies::create($data);

        return redirect()->route('inventory')->with('success','Item was stored in inventory');
    }

    public function update(Supplies $supplies) {
        
        return view('inventory.update.supplies', ['supplies'=>$supplies]);
        
    }

    public function save(Supplies $supplies, Request $request) {
        $data = $request->validate([
            'item_name'=> 'required',
            'qty'=> 'required|numeric',
            'description'=> 'required',
            'usage_rates'=> 'required',
            'cost'=> 'required|decimal:0,4',
            'storage_requirements'=> 'required',
        ]);

        $supplies->update($data);

        return redirect()->route('suppliesView')->with('success','Updated Successfully');
    }
    
    public function delete(Supplies $supplies) {
        $supplies->delete();

        return redirect()->route('suppliesView')->with('delete','Successfully Deleted');
    }
}
