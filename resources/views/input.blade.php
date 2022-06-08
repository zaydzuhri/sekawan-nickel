@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/pesanan" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ordererName" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="ordererName" name="orderer_name">
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Pilih Kendaraan" name="vehicle_id">
                <option selected>Pilih Kendaraan</option>
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Pilih Penyetuju 1" name="approver1_id">
                <option selected>Pilih Penyetuju 1</option>
                @foreach ($users as $user)
                    @if ($user->name !== "admin")
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Pilih Penyetuju 2" name="approver2_id">
                <option selected>Pilih Penyetuju 2</option>
                @foreach ($users as $user)
                    @if ($user->name !== "admin")
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start-date" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-date mx-1" id="start-date" name="start_date"></input>
        </div>
        <div class="mb-3">
            <label for="end-date" class="form-label">Tanggal Akhir</label>
            <input type="date" class="form-date mx-1" id="end-date" name="end_date"></input>
        </div>
        <button type="submit" class="btn btn-primary">Input</button>
    </form>
</div>
@endsection