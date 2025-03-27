<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function show()
    {
        $percentage = 50.1; // You can change this later to be dynamic
        return view('target-chart', compact('percentage'));
    }

    public function invoices()
{
    // Simulate latest invoices - replace with DB query later
    $labels = ['INV100', 'INV1009', 'INV101', 'INV1003', 'INV104'];
    $totals = [179, 161, 132, 87, 72];

    return view('invoice-chart', compact('labels', 'totals'));
}

public function topSellingParts()
{
    // 🧪 Dummy data for previewing chart
    $labels = ['Brake Pads', 'Oil Filter', 'Spark Plug', 'Headlight', 'Air Filter'];
    $data = [120, 85, 70, 50, 35];

    return view('top-selling-chart', compact('labels', 'data'));
}

/*$topParts = DB::table('sold_parts')
    ->select('part_name', DB::raw('SUM(quantity) as total_sold'))
    ->groupBy('part_name')
    ->orderByDesc('total_sold')
    ->limit(5)
    ->get();

$labels = $topParts->pluck('part_name');
$data = $topParts->pluck('total_sold');
*/
}
