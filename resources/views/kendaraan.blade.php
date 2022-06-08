@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        @foreach ($vehicles as $vehicle)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/'.$vehicle->image) }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $vehicle->name }}</h5>
                            <p class="card-text">{{ $vehicle->plate_number }}</p>
                            <p class="card-text">{{ $vehicle->type === "orang" ? "Mengangkut Orang" : "Mengangkut Barang" }}</p>
                            <p class="card-text">{{ $vehicle->owner === "milik" ? "Milik Perusahaan" : "Disewa dari Persewaan" }}</p>
                            <p class="card-text">Waktu Didaftarkan: {{ $vehicle->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if (Auth::user()->name === "admin")
        <div>
            <a href="/kendaraan/tambah" class="btn btn-primary" role="button">Tambah Kendaraan</a>
        </div>
    @endif
</div>
@endsection