@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::user()->name === "admin")
        <div class="mb-3">
            <a href="/pesanan/input" class="btn btn-primary" role="button">Input Pesanan</a>
        </div>
    @endif
    <div>
        @if (Auth::user()->name === "admin")
            @foreach ($orders as $order)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/'.$order->vehicle->image) }}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $order->vehicle->name }}</h5>
                                <p class="card-text">{{ $order->vehicle->plate_number }}</p>
                                <p class="card-text">Nama Pemesan: {{ $order->orderer_name }}</p>
                                <p class="card-text">Penyetuju 1: {{ $order->approver1->name }}</p>
                                <p class="card-text">Penyetuju 2: {{ $order->approver2->name }}</p>
                                <p class="card-text">Waktu Mulai: {{ $order->start_date }}</p>
                                <p class="card-text">Waktu Selesai: {{ $order->end_date }}</p>
                                @if ($order->is_approved1 && $order->is_approved2)
                                    <p class="card-text bg-success p-1"> Disetujui </p>
                                @elseif ($order->is_approved1 && !$order->is_approved2)
                                    <p class="card-text bg-warning p-1"> Menunggu Persetujuan 2 </p>
                                @elseif (!$order->is_approved1 && $order->is_approved2)
                                    <p class="card-text bg-warning p-1"> Menunggu Persetujuan 1 </p>
                                @else
                                    <p class="card-text bg-danger p-1"> Belum Disetujui </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($orders as $order)
                @if (Auth::user()->name === $order->approver1->name || Auth::user()->name === $order->approver2->name)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/'.$order->vehicle->image) }}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $order->vehicle->name }}</h5>
                                    <p class="card-text">{{ $order->vehicle->plate_number }}</p>
                                    <p class="card-text">Nama Pemesan: {{ $order->orderer_name }}</p>
                                    <p class="card-text">Penyetuju 1: {{ $order->approver1->name }}</p>
                                    <p class="card-text">Penyetuju 2: {{ $order->approver2->name }}</p>
                                    <p class="card-text">Waktu Mulai: {{ $order->start_date }}</p>
                                    <p class="card-text">Waktu Selesai: {{ $order->end_date }}</p>
                                    @if ($order->is_approved1 && $order->is_approved2)
                                        <p class="card-text bg-success p-1"> Disetujui </p>
                                    @elseif ($order->is_approved1 && !$order->is_approved2 && Auth::user()->name === $order->approver1->name)
                                        <p class="card-text bg-warning p-1"> Menunggu Persetujuan 2 </p>
                                    @elseif (!$order->is_approved1 && $order->is_approved2 && Auth::user()->name === $order->approver2->name)
                                        <p class="card-text bg-warning p-1"> Menunggu Persetujuan 1 </p>
                                    @else
                                        <form action="/pesanan/approve/{{ $order->id }}" method="post">
                                            @csrf
                                            <button type="submit" name="approve" class="btn btn-success">Setujui Pesanan</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
@endsection