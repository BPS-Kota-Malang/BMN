@extends('layouts.index')
@section('title','Edit Data Kategori Ruangan')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Kategori Ruangan</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('kategoriruangan/'.$kategori->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kd_kategruangan"><b>Kode Kategori</b></label>
                    <input type="text" class="form-control" id="kd_kategruangan" name="kode_kategruangan"
                        value="{{ $kategori->kode_kategruangan }}" readonly>
                </div>
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Nama Kategori</b></label>
                    <input type="text" class="form-control" id="nm_kategori" name="kategoriruangan"
                        value="{{ $kategori->nama_kategruangan }}" placeholder="Input nama kategori...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection