<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends controller
{
    public function index()
    {
        $historyOrdes = DB::table('comander_detail') 
            ->orderBy('id', 'desc')
            ->get();

        return view('history', compact('historyOrdes'));
    }
}