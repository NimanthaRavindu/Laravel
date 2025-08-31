<?php

namespace App\Http\Controllers;
use Illuminate\View\view;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $query = DB::table('products');
        $categoryDistribution = $query->select('category', DB::raw('COUNT(*) as count'))
            ->groupBy('category')->get();

        $query = DB::table('bills');
        $salesByDay = $query->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total) as total'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy(DB::raw('DATE(created_at)'))->orderBy('date')->get();

        $inputFlow = DB::table('bills')->sum('total');
        $outputFlow = DB::table('products')->sum('stock');
        $totalCustomers = DB::table('customers')->count();
        $totalProducts = DB::table('products')->count();

        return view('dashboard', compact(
            'categoryDistribution', 'salesByDay', 'inputFlow', 'outputFlow', 'totalCustomers', 'totalProducts'
        ));
    }
}
?>