<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function product(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                return view('admin.product');


            }else{
                return redirect()->back();
            }

        }else{
            return redirect("login");
        }

    }
    public function uploadproduct(Request $request)
    {
        $data = new Product();
        $image = $request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image = $imagename;
        $data->title= $request->title;
        $data->price= $request->price;
        $data->description= $request->des;
        $data->quantity=$request->quantity;
        $data->save();
        return redirect()->back()->with('message','Product Added Successfully');

    }

    public function showproduct()
    {
        $data= Product::all();
        return view('admin.showproduct',compact('data'));
    }

    public function updateview(string $id){

        $data = Product::findorfail($id);
        return view('admin.updateview',compact('data'));

    }
    public function updateproduct(Request $request,string $id){
        $data = Product::findorfail($request->id);
        $image = $request->file;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image = $imagename;
    }
        $data->title= $request->title;
        $data->price= $request->price;
        $data->description= $request->des;
        $data->quantity=$request->quantity;
        $data->save();
        return redirect()->back()->with('message','Product Updated Successfully');


    }




    public function deleteproduct(string $id){
        Product::findorfail($id)->delete();
       return redirect()->back()->with('message','Product Deleted');
    }

    public function showorder()
    {
        $orders =Order::all();
        return view('admin.showorder',compact('orders'));

    }

    public function updatestatus(string $id){
        $order = Order::findOrFail($id);
        $order->status="delivered";
        $order->save();
        return redirect()->back();

    }







}
