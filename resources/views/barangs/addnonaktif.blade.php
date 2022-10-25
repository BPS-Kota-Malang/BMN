@extends('layouts.index')
@section('title','Tambah Data Nonaktif')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Nonaktif</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('nonaktif.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kd_nonaktif"><b>Kode Nonaktif</b></label>
                    <input type="text" class="form-control" id="kd_nonaktif" name="kode_nonaktif"
                        value="{{ 'NON-'.date('dmY').'-'.$kd }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_barang"><b>Nama Barang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_product" id="id_product">
                        <option selected="">Pilih Barang...</option>
                        @foreach ($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="mr_barang"><b>Merek Barang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_merk" id="id_merk">
                        <option selected="">Pilih Merk...</option>
                        @foreach ($merk as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_merkbarang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="mr_barang"><b>Lokasi Barang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_lokasi" id="id_lokasi">
                        <option selected="">Pilih Lokasi...</option>
                        @foreach ($lokasi as $l)
                        <option value="{{ $l->id }}">{{ $l->nama_lokasibarang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="deskripsi"><b>Deskripsi</b></label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        placeholder="Input deskripsi...">
                </div>
                <div class="form-group">
                    <label class="form-label" for="jumlah"><b>Jumlah</b></label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Input jumlah...">
                </div>
                <div class="form-group">
                    <label class="form-label" for="mr_barang"><b>Status Barang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_status" id="id_status">
                        <option selected="">Pilih Status...</option>
                        @foreach ($status as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_statusbarang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="tgl_nonaktif"><b>Tanggal Nonaktif</b></label>
                    <input type="date" class="form-control" id="tgl_nonaktif" name="tanggal_nonaktif">
                </div><br><br>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection