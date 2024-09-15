<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkInProgress;

class WIPController extends Controller
{
    public function index() {
        return view('inventory.index');
    }
 
    public function create() {
        return view('inventory.wips');
    }

    public function view() {
        $wips = WorkInProgress::all();
        return view('inventory.view.wips', ['wips' => $wips]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'item_name'=> 'required',
            'qty'=> 'required|numeric',
            'description'=> 'required',
            'stage_of_production'=> 'required',
            'eta'=> 'required|date',
            'total_cost'=> 'required|decimal:0,4',
            'raw_materials'=> 'required',
        ]);

        $newInventory = WorkInProgress::create($data);

        return redirect()->route('inventory')->with('success','Item was stored in inventory');
    }

    public function update(WorkInProgress $wip) {
        
        return view('inventory.update.wips', ['wip'=>$wip]);
        
    }

    public function save(WorkInProgress $wip, Request $request) {
        $data = $request->validate([
            'item_name'=> 'required',
            'qty'=> 'required|numeric',
            'description'=> 'required',
            'stage_of_production'=> 'required',
            'eta'=> 'required|date',
            'total_cost'=> 'required|decimal:0,4',
            'raw_materials'=> 'required',
        ]);

        $wip->update($data);

        return redirect()->route('wipsView')->with('success','Updated Successfully');
    }
    
    public function delete(WorkInProgress $wip) {
        $wip->delete();

        return redirect()->route('wipsView')->with('delete','Successfully Deleted');
    }
}
