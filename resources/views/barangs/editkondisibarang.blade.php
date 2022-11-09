@extends('layouts.index')
@section('title','Edit Data Status')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Kondisi Barang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('kondisibarang/'.$kondisi->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Kode kondisi</b></label>
                    <input type="text" class="form-control" id="kode_kondisi"name="kode_kondisi" value="{{ $kondisi->kode_kondisi }}"
                        readonly>
                </div>

                <div class="form-group">
                        <label class="form-label"><b>jenis Kondisi</b></label>
                        <input type="text" class="form-control" id="jenis_kondisi" name="jenis_kondisi" value="{{ $kondisi->jenis_kondisi }}">
                </div>

                {{-- <div class="form-group">
                    <label class="form-label"><b>Status</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_statusbarang"
                        id="id_statusbarang">
                        <option selected disabled>Pilih Status</option>
                        @foreach ($status as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_statusbarang }}</option>
                        @endforeach
                    </select> --}}

                    <br><br>
                {{-- <div class="form-group">
                    <label class="form-label" for="nm_kategori"><b>Nama Status</b></label>
                    <input type="text" class="form-control" name="statusbarang" value="{{ $status->nama_statusbarang }}"
                        placeholder="Input nama kategori...">
                </div><br><br> --}}
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
