<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = \App\Models\Orders::all();
        return view('pesanan', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = \App\Models\Vehicle::all();
        $users = \App\Models\User::all();
        return view('input', ['vehicles' => $vehicles, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'orderer_name' => 'required',
            'vehicle_id' => 'required',
            'approver1_id' => 'required',
            'approver2_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        \App\Models\Orders::create($data);

        return redirect('/pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = \App\Models\Orders::find($id);
        if ($order->approver1_id == Auth::user()->id) {
            \App\Models\Orders::find($id)->update(['is_approved1' => 1]);
        } else if ($order->approver2_id == Auth::user()->id) {
            \App\Models\Orders::find($id)->update(['is_approved2' => 1]);
        }
            
        return redirect('/pesanan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
