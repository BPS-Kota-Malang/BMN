@extends('layouts.index')
@section('title','Edit Ajukan Peminjaman Ruangan')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Ajukan Peminjaman Ruangan</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('ajukanpinjamruangan/'.$reqpinjam->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="kd_peminjaman"><b>Kode Peminjaman</b></label>
                    <input type="text" class="form-control" id="kd_peminjaman" name="kode_peminjaman"
                        value="{{ $reqpinjam->kode_peminjaman }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_peminjam"><b>Nama Peminjam</b></label>
                    <input type="text" class="form-control" id="nm_peminjam" name="nama_peminjam"
                        value="{{Auth::user()->name}}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_petugas"><b>Petugas Aset GA</b></label>
                    <select class="form-select mb-3 shadow-none" name="petugas" id="id_ruangan">
                        <option disabled value>Pilih Petugas...</option>
                        <option value="{{ $reqpinjam->petugas }}">{{ $reqpinjam->admin->name }}</option>
                        @foreach ($petugas as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="ruangan_lama" value={{$reqpinjam->id_room}}>
                <div class="form-group">
                    <label class="form-label"><b>Nama Ruangan</b></label>
                    <select class="form-select mb-3 shadow-none" name="nama_ruangan" id="id_ruangan">
                        <option disabled="">Pilih Ruangan...</option>
                        <option value="{{ $reqpinjam->id_room }}">{{ $reqpinjam->ruangan->nama_ruangan }} - {{ $reqpinjam->gudang->nama_gedung }}</option>
                        @foreach ($ruangan as $r)
                        <option value="{{ $r->id }}">{{ $r->nama_ruangan }} - {{ $r->building->nama_gedung }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="deskripsi"><b>Deskripsi</b></label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        value="{{ $reqpinjam->deskripsi }}" placeholder="Input deskripsi keperluan...">
                </div>

                <div class="form-group">
                    <label class="form-label" for="tanggal_pinjam"><b>Tanggal Pinjam</b></label>
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                        value="{{ $reqpinjam->tanggal_pinjam }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="tgl_selesai"><b>Tanggal Selesai</b></label>
                    <input type="date" class="form-control" id="tgl_selesai" name="tanggal_selesai"
                        value="{{ $reqpinjam->tanggal_selesai }}">
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