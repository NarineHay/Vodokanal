<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contracts;
use App\Models\user;
use App\Models\ContractFile;
use Auth;

class ContractController extends Controller
{
     public function index(){
        $Contracts =Contracts::with('user')->get();

         return view('backend.users.Contract_index',compact('Contracts'));
     }

     public function add_contract(Request $request){

        $user=User::whereDoesntHave('roles')->get();
         return view('backend.users.add_new_contract_page' ,compact('user'));
     }

     public function store_contract(Request $request){

            $this->validate($request,[
                'number'=>'required',
                'date_start'=>'required|date|date_format:Y-m-d|after:yesterday',
                'date_end'=>'required|date|date_format:Y-m-d|after:date_start',
                'file.*' => 'required|max:10000|mimes:application/pdf,pdf',
                'user_id'=>'required'
            ]);


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

        return redirect()->back()->with('message','Договор добавлен');
     }


     public function show_contract($id){
        $Contracts =Contracts::with('ContractFile')->find($id);
         return view('backend.users.show_full_contract' ,compact('Contracts'));
     }

     public function edit_contract($id){
        $Contracts =Contracts::with('ContractFile')->find($id);
         return view('backend.users.edit_contract',compact('Contracts'));
     }

     public function update(Request $request ,$id){

        $Contracts =Contracts::find($id);

        $this->validate($request,[
            'file.*' => 'required|max:10000|mimes:application/pdf,pdf'
        ]);

        $Contracts->update([
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



        return redirect()->back()->with('message','Вы успешно редактировали');

     }


     public function delate_file($id){

        $delete = ContractFile::findOrFail($id);
        $image_path = public_path('/assets/contractfile/' . $delete->file_name);

        if(file_exists($image_path)){
            unlink($image_path);
        }
        $delete->delete();
        return redirect()->back()->with('delete','Вы успешно удалили');
     }


     public function index_contract_page($id){
        $delete = Contracts::where('id',$id)->delete();
        return redirect()->back()->with('delete','Вы успешно удалили');
     }
}
