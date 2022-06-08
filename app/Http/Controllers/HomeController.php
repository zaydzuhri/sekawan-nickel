<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orderData = \App\Models\Orders::select(\DB::raw("CAST(strftime('%m', start_date) AS INTEGER) as month, COUNT(*) as count"))
                    ->whereYear('start_date', date('Y'))
                    ->groupBy(\DB::raw("strftime('%m', start_date)"))
                    ->pluck('count', 'month');
        $orderPerMonth = [];
        for ($i = 0; $i <= 11; $i++) {
            $orderPerMonth[$i] = $orderData->has($i + 1) ? (int)$orderData->get($i + 1) : 0;
        }
        return view('home', compact('orderPerMonth'));
    }
}
