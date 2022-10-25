@extends('layouts.index')
@section('title','Data Peminjaman Barang')

@section('content')
<div class="col-sm-12">
    <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Riwayat Peminjaman</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE PINJAM</th>
                                <th>NAMA PEMINJAM</th>
                                <th>NAMA BARANG</th>
                                <!-- <th>MERK</th> -->
                                <!-- <th>LOKASI</th> -->
                                <!-- <th>MILIK</th> -->
                                <!-- <th>JUMLAH</th> -->
                                <th>DESKRIPSI</th>
                                <th>TANGGAL PINJAM</th>
                                <th>JATUH TEMPO</th>
                                <th>TANGGAL PENGEMBALIAN</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reqpinjamconfirmed as $rp)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$rp->kode_peminjaman}}</td>
                                <td>{{$rp->nama_peminjam}}</td>
                                <td>{{$rp->barang->kode_barang}} - {{$rp->barang->nama_barang}}
                                    ({{$rp->merk->nama_merkbarang}})</td>
                                {{-- <td>{{$rp->lokasi->nama_lokasibarang}} ({{$rp->gudang->nama_gedung}})</td>
                                <td>{{$rp->departemen->nama_departemen}}</td> --}}
                                <!-- <td>{{$rp->jumlah}}</td> -->
                                <td>{{$rp->deskripsi}}</td>
                                <td>{{$rp->tanggal_pinjam}}</td>
                                <td>{{$rp->tanggal_kembali}}</td>
                                <td>
                                    @if($rp->tanggal_pengembalian!=null)
                                    {{$rp->tanggal_pengembalian}}
                                    @elseif($rp->status!='disetujui')
                                    <span class="badge bg-secondary">tidak ada</span>
                                    @else
                                    <span class="badge bg-info">masih dipinjam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($rp->status=='disetujui')
                                    <span class="badge bg-success">disetujui</span>
                                    @elseif ($rp->status=='sudah dikembalikan')
                                    <span class="badge bg-warning">sudah dikembalikan</span>
                                    @elseif ($rp->status=='ditolak')
                                    <span class="badge bg-danger">ditolak</span>
                                    @else
                                    <span class="badge bg-warning">sudah dikembalikan dengan bukti</span>
                                    @endif
                                </td>
                                <td>
                                    @if($rp->status=='disetujui')
                                    <div class="flex align-items-center list-user-action">
                                        @if($rp->tanggal_pengembalian==null)

                                        @endif
                                        @elseif($rp->status=="sudah dikembalikan")

                                        @elseif($rp->status=="ditolak")
                                        @else
                                        <a class="btn btn-sm btn-icon"
                                            href="/peminjamanbarang/pengembalian/{{$rp->id}}">
                                            <button type="submit" class="btn btn-sm btn-icon btn-warning">
                                                <span class="btn-inner">
                                                    lihat bukti pengembalian
                                                </span>
                                            </button>
                                        </a>
                                        @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    <a href="/cetak_riwayatpinjambarang" button type="button" class="btn btn-primary">Print</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
