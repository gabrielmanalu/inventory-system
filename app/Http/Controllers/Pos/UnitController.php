<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function unitAll(){
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all', compact('units'));
    }

    public function unitAdd(){
        return view('backend.unit.unit_add');
    }

    public function storeUnit(Request $request){
        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }

    public function unitEdit($id){
        $unit = Unit::findorFail($id);
        return view('backend.unit.unit_edit', compact('unit'));
    }

    public function updateUnit(Request $request){
        $unit_id = $request->id;
        Unit::findorFail($unit_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }

    public function unitDelete($id){
        Unit::findorFail($id)->delete();

        $notification = array(
            'message' => 'Unit Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }

}
