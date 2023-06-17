<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use App\Models\subcategory;
use App\Models\category;
use Carbon\Carbon;

class frontendController extends Controller
{

    public function index(Request $request)
    {
        $datas = DB::table('content')->latest()->get();

        $popups = DB::table('popup')->latest()->get();

        $slider = DB::table('slider')->get();

        $subcategories = DB::table('subcategory')
            ->join('category', 'subcategory.cat_id', '=', 'category.id')
            ->select('subcategory.id', 'subcategory.cat_id', 'subcategory.time', 'subcategory.date', 'subcategory.number', 'category.name as category_name')
            ->whereIn('subcategory.id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('subcategory')
                    ->groupBy('cat_id');
            })
            ->orderBy('subcategory.time','Asc')
            ->take(5) // Limit the result to 5 records
            ->get();

        $todayDate = \Carbon\Carbon::today()->format('Y-m-d');
        $tomorrowDate = \Carbon\Carbon::tomorrow()->format('Y-m-d');

        $todayRecords = DB::table('subcategory')
            ->whereIn('id', function ($query) use ($todayDate) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('subcategory')
                    ->where('date', $todayDate)
                    ->groupBy('cat_id');
            })
            ->get();
        $tomorrowDate = \Carbon\Carbon::today()->subDay()->format('Y-m-d');

        $tomorrowRecords = DB::table('subcategory')
            ->whereIn('id', function ($query) use ($tomorrowDate) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('subcategory')
                    ->where('date', $tomorrowDate)
                    ->groupBy('cat_id');
            })
            ->get();


        $sub = DB::table('subcategory')
            ->join('category', 'subcategory.cat_id', '=', 'category.id')
            ->select('subcategory.date', 'subcategory.number', 'subcategory.cat_id', 'category.name as category_name')
            ->get();



        return view('frontend.index', compact('datas', 'popups', 'slider', 'subcategories', 'todayRecords', 'tomorrowRecords', 'sub'));
    }

    public function list()
    {
        return view('admin.user.list');
    }
    public function add_distributor()
    {
        return view('admin.add_distributor');
    }
    public function save_distributor(Request $request)
    {

        $customer = new User();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required'
        ]);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = FacadesHash::make($request->password);
        $response = $customer->save();
        if ($response) {
            return back()->with('success', 'Successfully register');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }
    public function page(Request $request)
    {
        $catId = $request->get('cat_id');
        $categoryId = $request->id;
        $datas = DB::table('content')->latest()->get();
        $popups = DB::table('popup')->latest()->get();

        $subcategories = DB::table('subcategory')
            ->join('category', 'subcategory.cat_id', '=', 'category.id')
            ->select('subcategory.id', 'subcategory.cat_id', 'subcategory.time', 'subcategory.date', 'subcategory.number', 'category.name as category_name')
            ->whereIn('subcategory.id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('subcategory')
                    ->groupBy('cat_id');
            })
            ->get();

        $todayDate = \Carbon\Carbon::today()->format('Y-m-d');
        $tomorrowDate = \Carbon\Carbon::tomorrow()->format('Y-m-d');

        $todayRecords = DB::table('subcategory')
            ->whereIn('id', function ($query) use ($todayDate) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('subcategory')
                    ->where('date', $todayDate)
                    ->groupBy('cat_id');
            })
            ->get();

        $tomorrowDate = \Carbon\Carbon::today()->subDay()->format('Y-m-d');

        $tomorrowRecords = DB::table('subcategory')
            ->whereIn('id', function ($query) use ($tomorrowDate) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('subcategory')
                    ->where('date', $tomorrowDate)
                    ->groupBy('cat_id');
            })
            ->get();

        $sub = DB::table('subcategory')
            ->join('category', 'subcategory.cat_id', '=', 'category.id')
            ->select('subcategory.date', 'subcategory.number', 'category.name as category_name', 'category.id as cat_id')

            ->orderByRaw("IF(subcategory.cat_id = ?, 0, 1)", [$catId])
            ->get();

        // Mapping cat_id to name
        $catIdToName = [];
        foreach ($sub as $subcategory) {
            $catIdToName[$subcategory->cat_id] = $subcategory->category_name;
        }

        // Get the category name based on $catId
        $categoryName = isset($catIdToName[$catId]) ? $catIdToName[$catId] : '';

        return view('frontend.dd', compact('datas', 'popups', 'subcategories', 'todayRecords', 'tomorrowRecords', 'sub', 'catId', 'categoryId', 'catIdToName', 'categoryName'));
    }
}
