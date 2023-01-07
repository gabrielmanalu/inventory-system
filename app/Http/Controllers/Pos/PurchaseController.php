<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PurchaseController extends Controller
{
    public function purchaseAll(){
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.purchase_all', compact('allData'));
    }

    public function purchaseAdd(){
        $suppliers = Supplier::all();
        $categories = Category::all();
        // $products = Product::all();
        $units = Unit::all();
        return view('backend.purchase.purchase_add', compact('suppliers', 'categories', 'units'));
    }
}
