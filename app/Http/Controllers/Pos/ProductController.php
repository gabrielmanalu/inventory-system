<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function productAll(){
        $products = Product::latest()->get();
        return view('backend.product.product_all', compact('products'));
    }

    public function productAdd(){
        $suppliers = Supplier::all();
        $categories = Category::all();
        $units = Unit::all();
        return view('backend.product.product_add', compact('suppliers', 'categories', 'units'));
    }

    public function storeProduct(Request $request){
        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }

    public function productEdit($id){
        $suppliers = Supplier::all();
        $categories = Category::all();
        $units = Unit::all();
        $product = Product::findorFail($id);

        return view('backend.product.product_edit', compact('product', 'suppliers', 'categories', 'units'));
    }

    public function updateProduct(Request $request){
        $product_id = $request->id;

        Product::findorFail($product_id)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }

    public function productDelete($id){
        Product::findorFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.all')->with($notification);
    }

}
