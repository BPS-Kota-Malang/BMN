@extends('layouts.index')
@section('title','Edit Data Merk Barang')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Merk Barang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('merkbarang/'.$merk->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Kode Merk</b></label>
                    <input type="text" class="form-control" id="nm_kategori" name="kode_merk"
                        value="{{ $merk->kode_merk }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Nama Merk</b></label>
                    <input type="text" class="form-control" id="nm_kategori" name="merk"
                        value="{{ $merk->nama_merkbarang }}" placeholder="Input merk barang...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection