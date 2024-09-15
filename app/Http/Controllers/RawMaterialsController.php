<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RawMaterials;
use Illuminate\Http\Request;

class RawMaterialsController extends Controller
{
    public function index() {
        return view('inventory.index');
    }
 
    public function create() {
        return view('inventory.create');
    }

    public function view() {
        $rawmaterials = RawMaterials::all();
        return view('inventory.view.rawmaterials', ['rawmaterials' => $rawmaterials]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'item_name'=> 'required',
            'qty'=> 'required|numeric',
            'description'=> 'required',
            'supplier'=> 'required',
            'expiry_date'=> 'required|date',
            'storage_condition'=> 'required',
            'measurement'=> 'required',
            'cost'=> 'required|decimal:0,4',
        ]);

        $newInventory = RawMaterials::create($data);

        return redirect()->route('inventory')->with('success','Item was stored in inventory');
    }

    public function update(RawMaterials $rawmaterial) {
        
        return view('inventory.update.rawmaterials', ['rawmaterial'=>$rawmaterial]);
        
    }

    public function save(RawMaterials $rawmaterial, Request $request) {
        $data = $request->validate([
            'item_name'=> 'required',
            'qty'=> 'required|numeric',
            'description'=> 'required',
            'supplier'=> 'required',
            'expiry_date'=> 'required|date',
            'storage_condition'=> 'required',
            'measurement'=> 'required',
            'cost'=> 'required|decimal:0,4',
        ]);

        $rawmaterial->update($data);

        return redirect()->route('rawMaterialsView')->with('success','Updated Successfully');
    }
    
    public function delete(RawMaterials $rawmaterial) {
        $rawmaterial->delete();

        return redirect()->route('rawMaterialsView')->with('delete','Successfully Deleted');
    }
}
