@extends('layouts.index')
@section('title','Tambah Data Departemen')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Departemen</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('departemen')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kd_departemen"><b>Kode Departemen</b></label>
                    <input type="text" class="form-control" id="kd_departemen" name="kode_departemen"
                        value="{{ 'DPT-'.$kd }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_departemen"><b>Nama Departemen</b></label>
                    <input type="text" class="form-control" id="nm_departemen" name="departemen"
                        placeholder="Input nama departemen...">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection