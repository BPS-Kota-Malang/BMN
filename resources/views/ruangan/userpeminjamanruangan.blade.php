@extends('layouts.index')
@section('title','Ajukan Peminjaman Ruangan')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Ajukan Peminjaman Ruangan</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('ajukanpinjamruangan.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="kd_peminjaman"><b>Kode Peminjaman</b></label>
                    <input type="text" class="form-control" id="kd_peminjaman" name="kode_peminjaman"
                        value="{{ 'PMR-'.date('dmY').'-'.$kd }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_peminjam"><b>Nama Peminjam</b></label>
                    <input type="text" class="form-control" id="nm_peminjam" name="nama_peminjam"
                        value="{{Auth::user()->name}}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_petugas"><b>Petugas Aset GA</b></label>
                    <select class="form-select mb-3 shadow-none" name="petugas" id="id_ruangan">
                        <option selected="">Pilih Petugas...</option>
                        @foreach ($petugas as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Nama Ruangan</b></label>
                    <select class="form-select mb-3 shadow-none" name="nama_ruangan" id="id_ruangan">
                        <option selected="">Pilih Ruangan...</option>
                        @foreach ($ruangan as $r)
                        <option value="{{ $r->id }}">{{ $r->nama_ruangan }} - {{$r->building->nama_gedung}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="deskripsi"><b>Deskripsi</b></label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        placeholder="Input deskripsi keperluan...">
                </div>
                <div class="form-group">
                    <label class="form-label" for="tanggal_pinjam"><b>Tanggal Pinjam</b></label>
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam">
                </div>
                <div class="form-group">
                    <label class="form-label" for="tanggal_selesai"><b>Jatuh Tempo</b></label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                </div>
                <div class="form-group">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <input type="text" class="form-control" name="status" value='sedang diajukan' readonly>
                </div><br><br>
                <button type="submit" class="btn btn-primary">Ajukan</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection