@extends('layouts.index')
@section('title','Edit Ajukan Peminjaman Barang')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Ajukan Peminjaman Barang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('ajukanpinjambarang.update',$reqpinjam->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="kd_peminjaman"><b>Kode Peminjaman</b></label>
                    <input type="text" class="form-control" id="kd_peminjaman" name="kode_peminjaman"
                        value="{{ $reqpinjam->kode_peminjaman }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_barang"><b>Nama Peminjam</b></label>
                    <input type="text" class="form-control" id="nm_barang" name="nama_peminjam"
                        value="{{Auth::user()->name}}" placeholder="Input nama barang..." readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_barang"><b>Petugas Aset IT</b></label>
                    <select class="form-select mb-3 shadow-none" name="petugas" id="id_barang">
                        <option disabled value>Pilih Petugas...</option>
                        <option value="{{ $reqpinjam->petugas }}">{{ $reqpinjam->admin->name }}</option>
                        @foreach ($petugas as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="barang_lama" value={{$reqpinjam->id_product}}>
                <div class="form-group">
                    <label class="form-label"><b>Nama Barang</b></label>
                   
                    <select class="form-select mb-3 shadow-none" name="nama_barang" id="id_barang">
                        <option disabled value>Pilih Barang...</option>
                        <option value="{{ $reqpinjam->id_product }}">{{ $reqpinjam->barang->kode_barang }} - {{ $reqpinjam->barang->nama_barang }} ({{$reqpinjam->merk->nama_merkbarang}})</option>
                        @foreach ($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->kode_barang }} - {{ $b->nama_barang }} ({{$b->merek->nama_merkbarang}}) </option>
                        @endforeach
                    </select>
                </div>
               
                <!-- <div class="form-group">
                    <label class="form-label" for="jm_barang"><b>Jumlah</b></label>
                    <input type="text" class="form-control" id="jm_barang" name="jumlah"
                        value="{{ $reqpinjam->jumlah }}" placeholder="Input jumlah barang...">
                </div> -->
                <div class="form-group">
                    <label class="form-label" for="nm_peminjam"><b>Deskripsi</b></label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        value="{{ $reqpinjam->deskripsi }}" placeholder="Input deskripsi keperluan...">
                </div>

                <div class="form-group">
                    <label class="form-label" for="tgl_dipinjam"><b>Tanggal Pinjam</b></label>
                    <input type="date" class="form-control" id="tgl_dipinjam" name="tanggal_pinjam"
                        value="{{ $reqpinjam->tanggal_pinjam }}">
                </div>
                <!-- <div class="form-group">
                        <label class="form-label" for="tgl_dipinjam"><b>Jatuh Tempo</b></label>
                        <input type="date" class="form-control" id="tgl_dipinjam" value="2021-12-18">
                    </div> -->
                <div class="form-group">
                    <label class="form-label" for="tgl_kembali"><b>Tanggal Dikembalikan</b></label>
                    <input type="date" class="form-control" id="tgl_kembali" name="tanggal_kembali"
                        value="{{ $reqpinjam->tanggal_kembali }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <input type="text" class="form-control" name="status" value=diajukan readonly>
                </div><br><br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection