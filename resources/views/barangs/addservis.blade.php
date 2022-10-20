@extends('layouts.index')
@section('title','Tambah Data Servis')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Servis</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('servis.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kd_servis"><b>Kode Servis</b></label>
                    <input type="text" class="form-control" id="kd_servis" name="kode_servis"
                        value="{{ 'SRV-'.date('dmY').'-'.$kd }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_barang"><b>Nama Barang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_product" id="id_product">
                        <option selected="">Pilih Barang...</option>
                        @foreach ($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->kode_barang }} - {{ $b->nama_barang }} ({{ $b->merek->nama_merkbarang }})</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="form-group">
                    <label class="form-label" for="deskripsi"><b>Deskripsi</b></label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        placeholder="Input deskripsi...">
                </div>
             
                <div class="form-group">
                    <label class="form-label" for="nm_petugas"><b>Nama Petugas</b></label>
                    <input type="text" class="form-control" id="nm_petugas" name="nama_petugas"
                    value="{{Auth::user()->name}}"  readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="tgl_servis"><b>Tanggal Servis</b></label>
                    <input type="date" class="form-control" id="tgl_servis" name="tanggal_servis">
                </div>
                <div class="form-group">
                    <label class="form-label" for="tgl_kembali"><b>Tanggal Kembali</b></label>
                    <input type="date" class="form-control" id="tgl_kembali" name="tanggal_kembali">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection