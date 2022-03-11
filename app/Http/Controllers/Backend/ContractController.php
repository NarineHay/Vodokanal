<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contracts;
use App\Models\user;
use App\Models\ContractFile;

class ContractController extends Controller
{
     public function index(){
        $Contracts =Contracts::with('user')->get();
         return view('backend.users.Contract_index',compact('Contracts'));
     }

     public function add_contract(Request $request){
         $user = User::All();
         return view('backend.users.add_new_contract_page' ,compact('user'));
     }

     public function store_contract(Request $request){
         
           $data = Contracts::create([
                'user_id'=>$request->user_id,
                'number'=>$request->number,
                'date_start'=>$request->date_start,
                'date_end'=>$request->date_end
            ]);

        if($request->hasFile('file')) {
        
            foreach ($request->file('file') as $imagefile){

                $name = $imagefile->getClientOriginalName();
                $imagefile->move(public_path('/assets/contractfile'), $name);

                ContractFile::create([
                    'contract_id'=>$data->id,
                    'file_name'=>$name,
                    'file_path'=>'/assets/contractfile'
                ]);
                    
            }

        }

        return redirect()->back()->with('message','успех');
     }


     public function show_contract($id){
        $Contracts =Contracts::with('ContractFile')->find($id);
         return view('backend.users.show_full_contract' ,compact('Contracts'));
     }

     public function edit_contract($id){
        $Contracts =Contracts::with('ContractFile')->find($id);
        $user = User::All();
         return view('backend.users.edit_contract',compact('Contracts','user'));
     }


     public function update(Request $request ,$id){

        $Contracts =Contracts::find($id);

        $Contracts->update([
            'user_id'=>$request->user_id,
            'number'=>$request->number,
            'date_start'=>$request->date_start,
            'date_end'=>$request->date_end
        ]);

        if($request->hasFile('file')) {
        
            foreach ($request->file('file') as $imagefile){

                $name = $imagefile->getClientOriginalName();
                $imagefile->move(public_path('/assets/contractfile'), $name);

                ContractFile::create([
                    'contract_id'=>$Contracts->id,
                    'file_name'=>$name,
                    'file_path'=>'/assets/contractfile'
                ]);
                    
            }

        }

        return redirect()->back()->with('message','успех');

     }


     public function delate_file($id){

        $delete = ContractFile::where('id',$id)->delete();
        return redirect()->back();
     }


     public function index_contract_page($id){
        $delete = Contracts::where('id',$id)->delete();
        return redirect()->back();
     }
}
