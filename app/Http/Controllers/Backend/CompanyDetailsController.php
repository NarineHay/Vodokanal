<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Our_company_details;

class CompanyDetailsController extends Controller
{
     public function index(){
        $Our_company_details = Our_company_details::first();
          return view('backend.homepage.company_details',compact('Our_company_details'));
     }

     public function edit_company_details(Request $request ,$id){

        $Our_company_details = Our_company_details::find($id);
        $Our_company_details->update([
            'content'=>$request->content,
        ]);
        return redirect()->back()->with('message','успех');
     }
}
