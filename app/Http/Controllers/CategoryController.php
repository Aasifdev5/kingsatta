<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\category;



class CategoryController extends Controller
{
    

  public function listcategory(){
        $datas = DB::table('category')->get();
     return view('admin.category.list',compact('datas'));
    }

  public function addcategory(Request $request){
     return view('admin.category.add');
     } 


     public function savecategory(Request $request)
{
    $category = new category;
    
    $category->name = $request->input('name');
    
    $selectedTime = $request->input('time');
    $selectedAMPM = $request->input('ampm');
    
    $category->time = $selectedTime . ' ' . $selectedAMPM;
    $res = $category->save();
    
    if ($res) {
        return redirect()->back()->with('success', 'category added successfully');
    } else {
        return redirect()->back()->with('fail', 'Error occurred');
    }
    
    return view('listcategory');
}


public function editcategory($id){
    $data = category::findOrFail($id);
    return view('admin.category.edit',compact('data'));
}



public function updatecategory(Request $request,$id){
    $data= category::findOrFail($id);
    $data->name = $request->name; 
    $selectedTime = $request->input('time');
    $selectedAMPM = $request->input('ampm');
    
    $data->time = $selectedTime . ' ' . $selectedAMPM;
    $data->update();
    $datas = category::all();
      return redirect('listcategory');
    }

  public function deletecategory(Request $request , $id){
         $data= category::findOrFail($id);
         $data->delete();
         return back()->with('success','category deleted successfully');
     }


}
