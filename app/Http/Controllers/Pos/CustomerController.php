<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class CustomerController extends Controller
{
    public function customerAll(){
        $customers = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customers'));
    }

    public function customerAdd(){
        return view('backend.customer.customer_add');
    }

    public function storeCustomer(Request $request){
        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(200,200)->save('upload/customer_images/'.$name_gen);
        $save_url = 'upload/customer_images/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'customer_image' => $save_url,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }

    public function customerEdit($id){
        $customer = Customer::findorFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    public function updateCustomer(Request $request){
        $customer_id = $request->id;

        if($request->file('customer_image')){
            $image = $request->file('customer_image');
            unlink(Customer::findorFail($customer_id)->customer_image);
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200,200)->save('upload/customer_images/'.$name_gen);
            $save_url = 'upload/customer_images/'.$name_gen;

            Customer::findorFail($customer_id)->update([
                'name' => $request->name,
                'customer_image' => $save_url,
                'mobile_number' => $request->mobile_number,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Customer Updated Successfully',
                'alert-type' => 'success'
            );
        } else {
            Customer::findorFail($customer_id)->update([
                'name' => $request->name,
                'mobile_number' => $request->mobile_number,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Updated Successfully',
                'alert-type' => 'success'
            );
        }


        return redirect()->route('customer.all')->with($notification);
    }

    public function customerDelete($id){
        $customer = Customer::findorFail($id);
        $image = $customer->customer_image;
        unlink($image);
        Customer::findorFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.all')->with($notification);
    }

}
