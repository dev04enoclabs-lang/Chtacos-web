<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $categories = DB::table('menu')
        ->select('category')
        ->distinct()
        ->get();

        $products = DB::table('menu')->get();

        return view('menu', compact('categories', 'products'));
    }
}