@extends('layouts.index')
@section('title','Dashboard')

@section('content')
@can('dashboard')
<div class="col-md-12 col-lg-12">
    <div class="row row-cols-1">
        <div class="overflow-hidden d-slider1 ">
            <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div class=" rounded p-3 bg-soft-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Barang</p>
                                <h4 class="counter">{{ $barang }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div class="border rounded p-3 bg-soft-primary">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M9.5,13.09L10.91,14.5L6.41,19H10V21H3V14H5V17.59L9.5,13.09M10.91,9.5L9.5,10.91L5,6.41V10H3V3H10V5H6.41L10.91,9.5M14.5,13.09L19,17.59V14H21V21H14V19H17.59L13.09,14.5L14.5,13.09M13.09,9.5L17.59,5H14V3H21V10H19V6.41L14.5,10.91L13.09,9.5Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Lokasi</p>
                                <h4 class="counter">{{ $lokasi }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div class=" rounded p-3 bg-soft-success">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M2 2V22H22V2H2M20 12H16V16H20V20H16V16H12V20H8V16H4V12H8V8H4V4H8V8H12V4H16V8H20V12M16 8V12H12V8H16M12 12V16H8V12H12Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Ruangan</p>
                                <h4 class="counter">{{ $ruangan }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div class="border rounded p-3 bg-soft-primary me-3">
                                <svg width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19 3H5A2 2 0 0 0 3 5V19A2 2 0 0 0 5 21H19A2 2 0 0 0 21 19V5A2 2 0 0 0 19 3M5 19V17H8.13A4.13 4.13 0 0 0 9.4 19M19 19H14.6A4.13 4.13 0 0 0 15.87 17H19M19 15H14V16A2 2 0 0 1 10 16V15H5V5H19Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Gudang</p>
                                <h4 class="counter">{{ $gudang }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div class="bg-soft-primary rounded p-3">
                                <svg width="24px" height="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M13,2.05C18.05,2.55 22,6.82 22,12C22,13.45 21.68,14.83 21.12,16.07L18.5,14.54C18.82,13.75 19,12.9 19,12C19,8.47 16.39,5.57 13,5.08V2.05M12,19C14.21,19 16.17,18 17.45,16.38L20.05,17.91C18.23,20.39 15.3,22 12,22C6.47,22 2,17.5 2,12C2,6.81 5.94,2.55 11,2.05V5.08C7.61,5.57 5,8.47 5,12A7,7 0 0,0 12,19M12,6A6,6 0 0,1 18,12C18,14.97 15.84,17.44 13,17.92V14.83C14.17,14.42 15,13.31 15,12A3,3 0 0,0 12,9L11.45,9.05L9.91,6.38C10.56,6.13 11.26,6 12,6M6,12C6,10.14 6.85,8.5 8.18,7.38L9.72,10.05C9.27,10.57 9,11.26 9,12C9,13.31 9.83,14.42 11,14.83V17.92C8.16,17.44 6,14.97 6,12Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Peminjaman Barang</p>
                                <h4 class="counter">{{ $pembarang }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div class="border rounded p-3 bg-soft-success me-3">
                                <svg width="24px" height="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M21.4 11.6L12.4 2.6C12 2.2 11.5 2 11 2H4C2.9 2 2 2.9 2 4V11C2 11.5 2.2 12 2.6 12.4L11.6 21.4C12 21.8 12.5 22 13 22C13.5 22 14 21.8 14.4 21.4L21.4 14.4C21.8 14 22 13.5 22 13C22 12.5 21.8 12 21.4 11.6M13 20L4 11V4H11L20 13M6.5 5C7.3 5 8 5.7 8 6.5S7.3 8 6.5 8 5 7.3 5 6.5 5.7 5 6.5 5M10.1 8.9L11.5 7.5L17 13L15.6 14.4L10.1 8.9M7.6 11.4L9 10L13 14L11.6 15.4L7.6 11.4Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Peminjaman Ruangan</p>
                                <h4 class="counter">{{ $pemruangan }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div class="rounded p-3 bg-soft-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">User</p>
                                <h4 class="counter">{{ $user }}</h4>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Reminder Jatuh Tempo Pengembalian Aset H-7</h4>
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
                            <th>LOKASI</th>
                            <th>MILIK</th>
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
                        @foreach($peminjaman as $rp)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$rp->kode_peminjaman}}</td>
                            <td>{{$rp->nama_peminjam}}</td>
                            <td>{{$rp->barang->kode_barang}} - {{$rp->barang->nama_barang}}
                                ({{$rp->merk->nama_merkbarang}})</td>
                            <td>{{$rp->lokasi->nama_lokasibarang}} ({{$rp->gudang->nama_gedung}})</td>
                            <td>{{$rp->departemen->nama_departemen}}</td>
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
                                    <a class="btn btn-sm btn-icon">
                                        <form action="{{ route('riwayatpinjambarang.return', $rp->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_product" value="{{$rp->id_product}}">
                                            <button type="submit" class="btn btn-sm btn-icon btn-warning"
                                                onclick="return confirm('Are you sure to return this product ?')">
                                                <span class="btn-inner">
                                                    kembalikan
                                                </span>
                                            </button>
                                        </form>
                                    </a>
                                    @endif
                                    @elseif($rp->status=="sudah dikembalikan")
                                    <a class="btn btn-sm btn-icon"
                                        href="/riwayatpinjambarang/buktipengembalian_create/{{$rp->id}}">
                                        <button type="submit" class="btn btn-sm btn-icon btn-warning">
                                            <span class="btn-inner">
                                                upload bukti pengembalian
                                            </span>
                                        </button>
                                    </a>
                                    @elseif($rp->status=="ditolak")
                                    @else
                                    <a class="btn btn-sm btn-icon" href="/peminjamanbarang/pengembalian/{{$rp->id}}">
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
            </div>
        </div>
    </div>
</div>
</div>

@endcan

@endsection