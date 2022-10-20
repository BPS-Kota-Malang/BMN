@extends('layouts.index')
@section('title','Edit Data Servis')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Servis</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('servis/'.$servis->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="kd_servis"><b>Kode Servis</b></label>
                    <input type="text" class="form-control" id="kd_servis" name="kode_servis"
                        value="{{ $servis->kode_servis }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Nama Barang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_product" id="id_product">
                        <option disabled value>Pilih Barang...</option>
                        <option value="{{ $servis->id_product }}">{{ $servis->barang->kode_barang }} - {{ $servis->barang->nama_barang }} ({{ $servis->merk->nama_merkbarang }})</option>
                        @foreach ($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->kode_barang }} - {{ $b->nama_barang }} ({{ $b->merek->nama_merkbarang }})</option>
                        @endforeach
                    </select>
                
                            <div class="form-group">
                                <label class="form-label" for="deskripsi"><b>Deskripsi</b></label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                    value="{{ $servis->deskripsi }}" placeholder="Input deskripsi...">
                            </div>
                          
                            <div class="form-group">
                                <label class="form-label" for="nm_petugas"><b>Nama Petugas</b></label>
                                <input type="text" class="form-control" id="nm_petugas" name="nama_petugas"
                                    value="{{ $servis->nama_petugas }}" placeholder="Input nama petugas...">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tgl_servis"><b>Tanggal Servis</b></label>
                                <input type="date" class="form-control" id="tgl_servis" name="tanggal_servis"
                                    value="{{ $servis->tanggal_servis }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tgl_kembali"><b>Tanggal Kembali</b></label>
                                <input type="date" class="form-control" id="tgl_kembali" name="tanggal_kembali"
                                    value="{{ $servis->tanggal_kembali}}">
                            </div><br><br>
                            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection