@extends('layouts.index')
@section('title','Edit Data Lokasi Barang')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Lokasi Barang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('lokasibarang/'.$lokasi->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="nm_barang"><b>Kode Lokasi</b></label>
                    <input type="text" class="form-control" id="nama_barang" name="kode_lokasi"
                        value="{{ $lokasi->kode_lokasi }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Nama Lokasi</b></label>
                    <input type="text" class="form-control" id="nm_kategori" name="lokasi"
                        value="{{ $lokasi->nama_lokasibarang }}" placeholder="Input lokasi...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection