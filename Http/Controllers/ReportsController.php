<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\View\view;
use App\Models\Sale;


class ReportsController extends Controller
{ 
     // Main reports page
    public function index()
    {
        return view('reports.index');
    }

    // Chart page
    public function chart()
    {
        // Example: Fetch monthly sales data for the chart
        $sales = Sale::selectRaw('MONTH(sale_date) as month, SUM(total_price) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $salesData = [];
        foreach ($sales as $sale) {
            $salesData[] = [
                'label' => date('F', mktime(0, 0, 0, $sale->month, 10)),
                'value' => $sale->total,
            ];
        }

        return view('reports.chart', compact('salesData'));

}

}

?>