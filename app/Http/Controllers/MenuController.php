<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
public function index()
{
    $categories = Category::all();
    $products = Menu::with('categoria')->get();

    // dd($products); 

    return view('menu', compact('categories', 'products'));
}
}