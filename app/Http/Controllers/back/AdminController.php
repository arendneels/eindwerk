<?php

namespace App\Http\Controllers\back;

use App\Order;
use App\Product;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $newReviewCount = Review::where('validated',false)->count();
        $totalProductCount = Product::count();
        $newOrderCount = Order::newOrders()->count();

        //Data will be shown for last 7 months
        $timespan = 7;
        $lastMonths = [];
        $totalEarned = [];

        for($i=$timespan; $i>=0; $i--){
            array_push($lastMonths, date("M", strtotime("-" . $i ." month")));
        }

        //Get data per month
        $oldestDate = date("Y-m", strtotime("-" . $timespan ." month"));

        //Build Custom Query
        $orders = DB::table('orders')
            ->select(DB::raw('sum(total) as total'),DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
            ->where('created_at', '>', $oldestDate)
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc', 'month', 'asc')
            ->get();

        //Fill the complete array
        foreach($lastMonths as $month){
            $monthEarned = $orders->where('month', date('m', strtotime($month)))->first();
            if($monthEarned){
                array_push($totalEarned, $monthEarned->total);
            }else{
                //If month has no orders
                array_push($totalEarned, 0);
            }
        }

        //Chart
        $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 220])
            ->labels($lastMonths)
            ->datasets([
                [
                    "label" => "Monthly Revenue (€)",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $totalEarned,
                ]
            ])
            ->options(['legend' => [
                'display' => false,
            ]]);


        return view('back.admin', compact('chartjs', 'newReviewCount', 'totalProductCount', 'newOrderCount'));
    }
}
