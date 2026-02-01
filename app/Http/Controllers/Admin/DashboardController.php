<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get order statistics
        $totalOrders = Order::count();
        $totalAmount = Order::sum('total');
        $pendingOrders = Order::where('status', 'pending')->count();
        $pendingAmount = Order::where('status', 'pending')->sum('total');
        $deliveredOrders = Order::where('status', 'delivered')->count();
        $deliveredAmount = Order::where('status', 'delivered')->sum('total');
        $canceledOrders = Order::where('status', 'canceled')->count();
        $canceledAmount = Order::where('status', 'canceled')->sum('total');
        
        // Get monthly revenue data for chart
        $monthlyData = Order::select(
                DB::raw('MONTH(order_date) as month'),
                DB::raw('YEAR(order_date) as year'),
                DB::raw('SUM(total) as total'),
                DB::raw('SUM(CASE WHEN status = "pending" THEN total ELSE 0 END) as pending'),
                DB::raw('SUM(CASE WHEN status = "delivered" THEN total ELSE 0 END) as delivered'),
                DB::raw('SUM(CASE WHEN status = "canceled" THEN total ELSE 0 END) as canceled')
            )
            ->whereYear('order_date', date('Y'))
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
        
        // Format data for chart
        $chartData = [
            'total' => array_fill(0, 12, 0),
            'pending' => array_fill(0, 12, 0),
            'delivered' => array_fill(0, 12, 0),
            'canceled' => array_fill(0, 12, 0)
        ];
        
        foreach ($monthlyData as $data) {
            $monthIndex = $data->month - 1;
            $chartData['total'][$monthIndex] = (float) $data->total;
            $chartData['pending'][$monthIndex] = (float) $data->pending;
            $chartData['delivered'][$monthIndex] = (float) $data->delivered;
            $chartData['canceled'][$monthIndex] = (float) $data->canceled;
        }
        
        // Get recent orders
        $recentOrders = Order::orderBy('order_date', 'desc')
            ->limit(10)
            ->get();
        
        return view('Admin.index', compact(
            'totalOrders', 
            'totalAmount',
            'pendingOrders',
            'pendingAmount',
            'deliveredOrders',
            'deliveredAmount',
            'canceledOrders',
            'canceledAmount',
            'chartData',
            'recentOrders'
        ));
    }
}