<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment_method;

class PaymentMethodController extends Controller
{
     public function index(){

         $Payment_method = Payment_method::All();
         return view('backend.homepage.payment_method',compact('Payment_method'));
     }

     public function payment_method_edit(Request $request ,$id){

        $data = Payment_method::find($id);
        $data->title=$request->title;
        $data->content=$request->content;
        $data->link=$request->link;
        if($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $filename = $image->getClientOriginalName();
            $image_new = $image->move(public_path('/assets/images/img_index'), $filename);
            $data->img_path = $request->file('img_path')->getClientOriginalName();
        }
       $data->save();
       return redirect()->back()->with('message','успех');
     }



    public function create_new(){
        return view('backend.homepage.create_new_payment_method');
    }

    public function add_new_payment_method(Request $request){
        
        $data = new Payment_method;
        $data->title=$request->title;
        $data->content=$request->content;
        $data->link=$request->link;
        if($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $filename = $image->getClientOriginalName();
            $image_new = $image->move(public_path('/assets/images/img_index'), $filename);
            $data->img_path = $request->file('img_path')->getClientOriginalName();
        }
       $data->save();
       return redirect()->back()->with('message','успех');
    }

     
}
