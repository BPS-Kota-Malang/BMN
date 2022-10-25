@extends('layouts.index')
@section('title','Data Peminjaman Ruangan')

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
                                <th>NAMA RUANGAN</th>
                                <th>GUDANG</th>
                                <th>DESKRIPSI</th>
                                <th>TANGGAL PINJAM</th>
                                <th>JATUH TEMPO</th>
                                <th>TANGGAL SELESAI</th>
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
                                <td>{{$rp->ruangan->kode_ruangan}} - {{$rp->ruangan->nama_ruangan}}</td>
                                <td>{{$rp->gudang->nama_gedung}}</td>
                                <td>{{$rp->deskripsi}}</td>
                                <td>{{$rp->tanggal_pinjam}}</td>
                                <td>{{$rp->tanggal_selesai}}</td>
                                <td>
                                    @if($rp->tgl_selesai!=null)
                                    {{$rp->tgl_selesai}}
                                    @elseif($rp->status!='disetujui')
                                    <span class="badge bg-secondary">tidak ada</span>
                                    @else
                                    <span class="badge bg-info">masih dipinjam</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($rp->status=='disetujui')
                                    <span class="badge bg-success">disetujui</span>
                                    @elseif ($rp->status=='selesai')
                                    <span class="badge bg-warning">sudah selesai</span>
                                    @else
                                    <span class="badge bg-danger">ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if($rp->status=='disetujui')
                                    <div class="flex align-items-center list-user-action">
                                        @if($rp->tgl_selesai==null)
                                     
                                        @endif
                                    @elseif($rp->status=='ditolak')
                                    @else($rp->status=='selesai')
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    <a href="/cetak_riwayatpinjamruangan" button type="button"
                        class="btn btn-primary">Print</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection