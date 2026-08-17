<?php

namespace App\Http\Controllers;

use App\Models\ComanderDetall;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HistoryController extends Controller
{
    public function index(): View
    {
        $historyOrders = ComanderDetall::with('comander', 'menu')
            ->orderBy('id', 'desc')
            ->get();

        return view('history', compact('historyOrders'));
    }
}
