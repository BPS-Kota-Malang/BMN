@extends('layouts.index')
@section('title','Data Peminjaman Ruangan')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar Peminjaman Ruangan</h4>
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
                            {{-- <th>GUDANG</th> --}}
                            <th>DESKRIPSI</th>
                            <th>TANGGAL PINJAM</th>
                            <th>JATUH TEMPO</th>
                            <th>TANGGAL SELESAI</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reqpinjam as $rp)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$rp->kode_peminjaman}}</td>
                            <td>{{$rp->nama_peminjam}}</td>
                            <td>{{$rp->ruangan->kode_ruangan}} - {{$rp->ruangan->nama_ruangan}}</td>
                            {{-- <td>{{$rp->gudang->nama_gedung}}</td> --}}
                            <td>{{$rp->deskripsi}}</td>
                            <td>{{$rp->tanggal_pinjam}}</td>
                            <td>{{$rp->tanggal_selesai}}</td>
                            <td>
                                @if($rp->tgl_selesai!=null)
                                {{$rp->tgl_selesai}}
                                @else
                                <span class="badge bg-secondary">belum ada</span>
                                @endif
                            </td>
                            <td>
                                @if ($rp->status=='sedang diajukan')
                                <span class="badge bg-success">diajukan</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Edit"
                                        href="/peminjamanruangan/approve/{{$rp->id}}">
                                        <span class="btn-inner">
                                            <svg width="32" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M8.43994 12.0002L10.8139 14.3732L15.5599 9.6272"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="" data-original-title="Delete"
                                        href="/peminjamanruangan/rejected/{{$rp->id}}">
                                        <span class="btn-inner">
                                            <svg width="32" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.3955 9.59497L9.60352 14.387" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M14.3971 14.3898L9.60107 9.59277" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div><br>
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
                                {{-- <th>GUDANG</th> --}}
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
                                {{-- <td>{{$rp->gudang->nama_gedung}}</td> --}}
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
                                        <a class="btn btn-sm btn-icon">
                                            <form action="{{ route('statuspinjamruangan.return', $rp->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id_room" value="{{$rp->id_room}}">
                                                <button type="submit" class="btn btn-sm btn-icon btn-warning"
                                                    onclick="return confirm('Are you sure to submit it?')">
                                                    <span class="btn-inner">
                                                        selesai
                                                    </span>
                                                </button>
                                            </form>
                                        </a>
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
