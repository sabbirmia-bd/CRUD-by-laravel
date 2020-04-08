<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crudoperation;
use Carbon\Carbon;

class CrudusersController extends Controller
{
    function addcrudusers(){
      $crudoperation = Crudoperation::latest()->simplePaginate(5);
      return view('crudusers.index', compact('crudoperation'));
    }
    function crudusersform(){
      return view('crudusers.insert');
    }
    function userpost(Request $request){
      $request->validate([
        'add_name' => 'required',
        'add_email' => 'required'
      ],[
        'add_name.required' => 'Please Enter Your Name',
        'add_email.required' => 'Please Enter Your Email'
      ]);
      Crudoperation::insert([
        'add_name' => $request->add_name,
        'add_description' => $request->add_description,
        'add_email' => $request->add_email,
        'created_at' => Carbon::now()
      ]);
      return back()->with('data_add_status', 'Data Add Successfully');
    }
    function userupdate($crudoperation_id){
      $add_description = Crudoperation::find($crudoperation_id)->add_description;
      return view('crudusers.update', compact('crudoperation_id', 'add_description'));
    }
    function userupdatepost(Request $request){
      $request->validate([
        'user_update' => 'required'
      ],[
        'user_update.required' => 'Please Enter YOur Description'
        ]);
        Crudoperation::find($request->crudoperation_id)->update([
          'add_description' => $request->user_update
        ]);
        return redirect('/add/crudusers')->with('update_status', 'Update Successfully');
    }
    function userview($crudoperation_id){
      $add_description_from_db = Crudoperation::find($crudoperation_id)->add_description;
      return view('crudusers.user_view', compact('add_description_from_db'));
    }
    function userdelete($crudoperation_id){
      Crudoperation::find($crudoperation_id)->delete();
      return back()->with('delete_status', 'Deleted Successfully');
    }
}
