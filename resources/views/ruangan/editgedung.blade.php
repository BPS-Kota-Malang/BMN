@extends('layouts.index')
@section('title','Edit Data Gedung')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Gudang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('gedung/'.$building->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="kd_gudang"><b>Kode Gudang</b></label>
                    <input type="text" class="form-control" id="kd_gudang" name="kode_gudang"
                        value="{{ $building->kode_gudang }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_gedung"><b>Nama Gudang</b></label>
                    <input type="text" class="form-control" id="nm_gedung" name="gedung"
                        value="{{ $building->nama_gedung }}" placeholder="Input nama gedung...">
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_gedung"><b>Alamat</b></label>
                    <input type="text" class="form-control" id="nm_gedung" name="alamat" value="{{ $building->alamat}}"
                        placeholder="Input alamat gedung...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection