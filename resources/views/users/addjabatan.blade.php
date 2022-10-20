@extends('layouts.index')
@section('title','Tambah Data Jabatan')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Jabatan</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('jabatanuser')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kd_jabatan"><b>Kode Jabatan</b></label>
                    <input type="text" class="form-control" id="kd_jabatan" name="kode_jabatan" value="{{ 'JBT-'.$kd }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_jabatan"><b>Nama Jabatan</b></label>
                    <input type="text" class="form-control" id="id_jabatan" name="jabatan"
                        placeholder="Input nama jabatan...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection