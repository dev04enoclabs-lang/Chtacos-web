<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComanderDetall;
use App\Models\Comander;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function index()
    {
        // Ventas Acomulado de Hoy
        $todaySales = ComanderDetall::whereHas('comander', function ($query) {
            $query->whereDate('create_at', carbon::today());
        })->sum('total');

        $todayOrders = comander::whereDate('create_at', Carbon::today())->count();

        // Ventas semanales

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $weeklySales = ComanderDetall::whereHas('comander', function ($query) use ($startOfWeek, $endOfWeek) {
            $query->whereBetween('create_at', [$startOfWeek, $endOfWeek]);
        })->sum('total');

        $weeklyOrders = Comander::whereBetween('create_at', [$startOfWeek, $endOfWeek])->count();

        // Venta Mensual
        
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $monthlysales = ComanderDetall::whereHas('comander',function ($query) use ($startOfMonth, $endOfMonth){
            $query->whereBetween('create_at', [$startOfMonth, $endOfMonth]);
        })->sum('total');

        $monthlyorders = Comander::whereBetween('create_at', [$startOfMonth, $endOfMonth])->count();
        
        // Venta Total Acomulado
        $totalSales = ComanderDetall::sum('total');
        $totalOrders = Comander::count();

        // Definir las variables para traer las ventas por tiempo
        return view('sales', compact('todaySales', 'todayOrders', 'weeklySales', 'weeklyOrders', 'monthlysales', 'monthlyorders', 'totalSales', 'totalOrders'));
    }
}
