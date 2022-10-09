<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function supplierAll(){
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('suppliers'));
    }

    public function supplierAdd(){
        return view('backend.supplier.supplier_add');
    }

    public function storeSupplier(Request $request){
        Supplier::insert([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    public function supplierEdit($id){
        $supplier = Supplier::findorFail($id);
        return view('backend.supplier.supplier_edit', compact('supplier'));
    }

    public function updateSupplier(Request $request){
        $supplier_id = $request->id;

        Supplier::findorFail($supplier_id)->update([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.all')->with($notification);
    }

    public function supplierDelete($id){
        Supplier::findorFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.all')->with($notification);
    }

}
