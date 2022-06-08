@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/kendaraan" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Gambar Kendaraan</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <div class="mb-3">
            <label for="modelName" class="form-label">Nama Model</label>
            <input type="text" class="form-control" id="vehicleName" name="name">
        </div>
        <div class="mb-3">
            <label for="plateNumber" class="form-label">Pelat Nomor</label>
            <input type="text" class="form-control" id="plateNumber" name="plate_number">
        </div>
        <div class="mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="orang" checked>
                <label class="form-check-label" for="type">Angkutan Barang</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="barang">
                <label class="form-check-label" for="type">Angkutan Orang</label>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="owner" id="inlineRadio3" value="milik" checked>
                <label class="form-check-label" for="owner">Milik Perusahaan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="owner" id="inlineRadio4" value="sewa">
                <label class="form-check-label" for="owner">Disewa</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection