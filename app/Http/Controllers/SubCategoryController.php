<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\subcategory;
use App\Models\category;

use App\Models\User;

class SubCategoryController extends Controller
{
    //

    public function listsubcategory()
    {
        $datas = DB::table('subcategory')
            ->join('category', 'subcategory.cat_id', '=', 'category.id')
            ->select('subcategory.*', 'category.name as category_name')
            ->get();

        return view('admin.subcategory.list', compact('datas'));
    }


    public function addsubcategory(Request $request)
    {
        $data1 = category::all();
        return view('admin.subcategory.add', compact('data1'));
    }

    public function savesubcategory(Request $request)
    {
        $player_name1 = DB::select("select count(id) as record from subcategory where cat_id='" . $request->input('data1') . "' and date='" . $request->date . "'");

        $player_name1 = array_column($player_name1, 'record', '0');

        if (($player_name1['0']) == 1) {
            return back()->with('error', 'it can not created because it already exits.');
        }
        $subcategory = new subcategory;
        $sql = "SELECT * FROM `category` where id='" . $request->input('data1') . "' ";
        $time = DB::select($sql);
        $time = array_column($time, 'time', '0');
        $subcategory->cat_id = $request->input('data1');
        $subcategory->date = $request->input('date');
        $subcategory->time = $time['0'];
        $subcategory->number = $request->input('number');


        $res = $subcategory->save();

        if ($res) {
            return redirect()->back()->with('success', 'subcategory added successfully');
        } else {
            return redirect()->back()->with('fail', 'Error occurred');
        }

        return redirect('listsubcategory');
    }



    public function editsubcategory($id)
    {
        $data1 = category::all();
        $data = subcategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('data', 'data1'));
    }

    public function updatesubcategory(Request $request, $id)
    {
        $data = subcategory::findOrFail($id);
        $sql = "SELECT * FROM `category` where id='" . $request->input('data1') . "' ";
        $time = DB::select($sql);
        $time = array_column($time, 'time', '0');
        $data->cat_id = $request->input('data1');
        $data->date = $request->input('date');
        $data->time = $time['0'];
        $data->number = $request->input('number');
        $data->update();
        $datas = subcategory::all();
        return redirect('listsubcategory');
    }

    public function deletesubcategory(Request $request, $id)
    {
        $data = subcategory::findOrFail($id);
        $data->delete();
        return back()->with('success', 'subcategory deleted successfully');
    }
}
