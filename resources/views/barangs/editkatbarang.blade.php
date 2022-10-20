@extends('layouts.index')
@section('title','Edit Data Kategori Barang')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Kategori Barang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('kategoribarang/'.$katbar->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Kode Kategori</b></label>
                    <input type="text" class="form-control" id="nm_kategori" name="kode_kategori"
                        value="{{ $katbar->kode_kategori }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Nama Kategori</b></label>
                    <input type="text" class="form-control" id="nm_kategori" name="kategoribarang"
                        value="{{ $katbar->nama_kategbarang }}" placeholder="Input nama kategori...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection