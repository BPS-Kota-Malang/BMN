@extends('layouts.index')
@section('title','Bukti Pengembalian Aset')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
        <h4><i class="fa fa-pencil-alt"></i> Bukti Pengembalian Aset</h4><br>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama Peminjam</td>
                        <td>:</td>
                        <td>{{ $pengembalian->nama_peminjam }}</td>
                    </tr>
                    <tr>
                        <td>Kode Peminjaman</td>
                        <td>:</td>
                        <td>{{ $pengembalian->kode_peminjaman }}</td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td>{{ $pengembalian->barang->kode_barang }} - {{ $pengembalian->barang->nama_barang }} ({{ $pengembalian->merk->nama_merkbarang }})</td>
                    </tr>
                    {{-- <tr>
                        <td>Lokasi Barang</td>
                        <td>:</td>
                        <td>{{$pengembalian->lokasi->nama_lokasibarang}} ({{$pengembalian->gudang->nama_gedung}})</td>
                    </tr>
                    <tr>
                        <td>Milik</td>
                        <td>:</td>
                        <td>{{$pengembalian->departemen->nama_departemen}}</td>
                    </tr> --}}
                    <tr>
                        <td>Keperluan</td>
                        <td>:</td>
                        <td>{{$pengembalian->deskripsi}}</td>
                    </tr>
                    <tr>
                        <td>Petugas Penanggung Jawab Aset IT</td>
                        <td>:</td>
                        <td>{{ $pengembalian->admin->name }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td>:</td>
                        <td>{{$pengembalian->tanggal_pinjam}}</td>
                    </tr>
                    <tr>
                        <td>Jatuh Tempo</td>
                        <td>:</td>
                        <td>{{$pengembalian->tanggal_kembali}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengembalian</td>
                        <td>:</td>
                        <td>{{$pengembalian->tanggal_pengembalian}}</td>
                    </tr>

                    <tr>
                        <td>Kondisi Barang Setelah Dipinjam</td>
                        <td>:</td>
                        <td>{{ $pengembalian->kondisi_setelahdipinjam }}</td>
                    </tr>
                    <tr>
                        <td>Catatan</td>
                        <td>:</td>
                        <td>{{ $pengembalian->catatan }}</td>
                    </tr>
                    <!-- <tr>
                        <td>Foto Bukti Pengembalian</td>
                        <td>:</td>
                        <td>
                        {{ $pengembalian->bukti_pengembalian }}
                        </td> -->
                    </tr>
                </tbody>
            </table>
            <a href="/cetak_buktipengembalianbarang/buktipengembalian/{{$pengembalian->id}}" button type="button" class="btn btn-primary">Print</button></a>
        </div>
    </div>
</div>

@endsection
