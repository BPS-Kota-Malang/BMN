@extends('layouts.index')
@section('title','Tambah Data Kategori Ruangan')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Kategori Ruangan</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('kategoriruangan')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kd_kategruangan"><b>Kode Kategori</b></label>
                    <input type="text" class="form-control" id="kd_kategruangan" name="kode_kategruangan"
                        value="{{ 'KTR-'.$kd }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Nama Kategori</b></label>
                    <input type="text" class="form-control" id="nm_kategori" name="kategoriruangan"
                        placeholder="Input nama kategori...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection