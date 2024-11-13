<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $ao = DB::table('aos')
        ->orderByDesc('id')
        ->limit(6)
        ->get();
        return view('home', compact('ao'));
    } 

    //chi tiết sp
    public function detail($id)
    {
        $aos = DB::table('aos')
        ->where('id', $id)
        ->first();
        return view('detail', compact('aos'));
    }
    //danh sach sp
    public function listSP($id)
    {
        $aos = DB::table('aos')
        ->where('category_id', $id)
        ->get();
        return view('listSP', compact('aos'));
    }
}
