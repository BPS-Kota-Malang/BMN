@extends('layouts.index')
@section('title','Upload Bukti Pengembalian Barang')
@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Upload Bukti Pengembalian Barang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('riwayatpinjambarang.buktipengembalian_store', $pengembalian->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label"><b>Kode Peminjaman</b></label>
                    <input type="text" class="form-control" name="kode_peminjaman"
                        value="{{ $pengembalian->kode_peminjaman }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Nama Peminjam</b></label>
                    <input type="text" class="form-control" name="nama_peminjam"
                        value="{{ $pengembalian->nama_peminjam }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Nama Barang</b></label>
                    <input type="text" class="form-control" name="nama_barang"
                        value="{{ $pengembalian->barang->kode_barang }} - {{ $pengembalian->barang->nama_barang }} ({{$pengembalian->merk->nama_merkbarang}})"
                        readonly>
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Petugas Penanggung Jawab Aset</b></label>
                    <input type="text" class="form-control" name="nama_petugas" value="{{ Auth::user()->name}}"
                        readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="hb_barang"><b>Kondisi Barang Setelah Dipinjam</b></label>
                    <input type="text" class="form-control" name="kondisi"
                        value="misal : kondisi barang rusak / masih bagus">
                </div>
                <div class="form-group">
                    <label class="form-label" for="hb_barang"><b>Catatan</b></label>
                    <input type="text" class="form-control" name="catatan" value="misal: kondisi rusak karena....">
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Tanggal Peminjaman</b></label>
                    <input type="text" class="form-control" name="tanggal_pinjam"
                        value="{{ $pengembalian->tanggal_pinjam }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Jatuh Tempo</b></label>
                    <input type="text" class="form-control" name="tanggal_kembali"
                        value="{{ $pengembalian->tanggal_kembali }}" readonly>
                </div>
                <!-- <div class="form-group">
                        <label class="form-label" for="hb_barang"><b>Upload Bukti Pengembalian Barang</b></label>
                        <input type="text" class="form-control" name="fotobukti" placeholder="Masukkan foto...">
        
                    </div> -->
                    <button type="submit" class="btn btn-primary">Simpan</button> 
            <br>
        </div>
  
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection