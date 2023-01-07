<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchaseAll(){
        $purchases = Purchase::latest()->get();
        return view('backend.purchase.purchase_all', compact('purchases'));
    }

}
