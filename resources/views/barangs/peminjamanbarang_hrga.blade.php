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
                                <th>KONDISI</th>
                                <th>CATATAN</th>
                                <!-- <th>MERK</th> -->
                                <th>JUMLAH</th>
                                <th>DESKRIPSI</th>
                                <th>TANGGAL PINJAM</th>
                                <th>JATUH TEMPO</th>
                                <th>TANGGAL PENGEMBALIAN</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reqpinjamconfirmed as $rpc)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$rpc->kode_peminjaman}}</td>
                                <td>{{$rpc->nama_peminjam}}</td>
                                <td>{{$rpc->barang->kode_barang}} - {{$rpc->barang->nama_barang}}
                                    ({{$rpc->merk->nama_merkbarang}})</td>
                                    <td>{{ $rpc->kondisi_setelahdipinjam }}</td>
                            <td>{{ $rpc->catatan }}</td>
                                 <td>{{$rpc->jumlah}}</td>
                                <td>{{$rpc->deskripsi}}</td>
                                <td>{{$rpc->tanggal_pinjam}}</td>

                                <td>{{$rpc->tanggal_pengembalian}}</td>
                                <td>
                                    @if($rpc->tanggal_pengembalian!=null)
                                    {{$rpc->tanggal_pengembalian}}
                                    @elseif($rpc->status!='disetujui')
                                    <span class="badge bg-secondary">tidak ada</span>
                                    @else
                                    <span class="badge bg-info">masih dipinjam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($rpc->status=='disetujui')
                                    <span class="badge bg-success">disetujui</span>
                                    @elseif ($rpc->status=='sudah dikembalikan')
                                    <span class="badge bg-warning">sudah dikembalikan</span>
                                    @elseif ($rpc->status=='ditolak')
                                    <span class="badge bg-danger">ditolak</span>
                                    @else
                                    <span class="badge bg-warning">sudah dikembalikan dengan bukti</span>
                                    @endif
                                </td>
                                <td>
                                    @if($rpc->status=='disetujui')
                                    <div class="flex align-items-center list-user-action">
                                        @if($rpc->tanggal_pengembalian)

                                        @endif
                                        @elseif($rpc->status=="sudah dikembalikan")

                                        @elseif($rpc->status=="ditolak")
                                        @else
                                        <a class="btn btn-sm btn-icon"
                                            href="/peminjamanbarang/pengembalian/{{$rpc->id}}">
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
