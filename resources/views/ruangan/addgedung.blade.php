@extends('layouts.index')
@section('title','Tambah Data Gudang')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Gudang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('gedung')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kd_gudang"><b>Kode Gudang</b></label>
                    <input type="text" class="form-control" id="kd_gudang" name="kode_gudang" value="{{ 'GDG-'.$kd }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_gedung"><b>Nama Gudang</b></label>
                    <input type="text" class="form-control" id="nm_gedung" name="gedung"
                        placeholder="Input nama gudang...">
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_gedung"><b>Alamat</b></label>
                    <input type="text" class="form-control" id="nm_gedung" name="alamat"
                        placeholder="Input alamat gudang...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection