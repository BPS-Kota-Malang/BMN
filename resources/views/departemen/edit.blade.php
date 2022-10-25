@extends('layouts.index')
@section('title','Edit Data Departemen')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Departemen</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('departemen/'.$department->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="kd_departemen"><b>Kode Departemen</b></label>
                    <input type="text" class="form-control" id="kd_departemen" name="kode_departemen"
                        value="{{ $department->kode_departemen }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_departemen"><b>Nama Departemen</b></label>
                    <input type="text" class="form-control" id="nm_departemen" name="departemen"
                        value="{{ $department->nama_departemen }}" placeholder="Input nama departemen...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection