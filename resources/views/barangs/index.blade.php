@extends('layouts.index')
@section('title','Data Barang')

@section('content')
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
                                <p class="mb-2">Barang Tersedia</p>
                                <h4 class="counter">{{ $jtersedia }}</h4>
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
                                <p class="mb-2">Barang Dipinjam</p>
                                <h4 class="counter">{{ $jdipinjam }}</h4>
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
                                <p class="mb-2">Barang Rusak</p>
                                <h4 class="counter">{{ $jrusak }}</h4>
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
                                <p class="mb-2">Barang Diservis</p>
                                <h4 class="counter">{{ $jdiservis }}</h4>
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
                                <p class="mb-2">Barang Hilang</p>
                                <h4 class="counter">{{ $jhilang }}</h4>
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
                <h4 class="card-title">Daftar Barang</h4>
            </div>
        </div>
        <div class="card-body">

            <form action="{{route('barang.create')}}" method="GET">
                <button type="submit" class="btn btn-success">Tambah Barang</button>
            </form>
           
            <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE BARANG</th>
                            <th>NAMA BARANG</th>
                            <!-- <th>MERK</th> -->
                            <th>KATEGORI</th>
                            {{-- <th>LOKASI</th>
                            <th>OWNER</th> --}}
                            <!-- <th>HARGA BELI</th> -->
                            <!-- <th>JUMLAH</th>
                            <th>SATUAN</th> -->
                            <th>STATUS</th>
                            <th>TANGGAL INPUT</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $b)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$b->kode_barang}}</td>
                            <td>{{$b->nama_barang}} ({{$b->merek->nama_merkbarang}})</td>
                            <td>{{$b->productcategory->nama_kategbarang}}</td>
                            {{-- <!--<td>{{$b->lokasi->nama_lokasibarang}} ({{$b->gudang->nama_gedung}})</td>-->
                            <!--<td>{{$b->departemen->nama_departemen}}</td>--> --}}
                            <!-- <td>{{$b->harga_beli}}</td> -->
                            <!-- <td>{{$b->jumlah}}</td>
                            <td>{{$b->satuan}}</td> -->
                            <td>
                                @if ($b->status->nama_statusbarang=='Tersedia')
                                    <span class="badge bg-primary">Tersedia</span>
                                @elseif ($b->status->nama_statusbarang=='Rusak')
                                    <span class="badge bg-danger">Rusak</span>
                                @elseif ($b->status->nama_statusbarang=='Hilang')
                                    <span class="badge bg-secondary">Hilang</span>
                                @elseif ($b->status->nama_statusbarang=='Dipinjam')
                                    <span class="badge bg-info">Dipinjam</span>
                                @elseif ($b->status->nama_statusbarang=='Diservis')
                                    <span class="badge bg-warning"">Diservis</span>
                                @else ($b->status->nama_statusbarang=='Diajukan')
                                    <span class="badge bg-success">Diajukan</span>
                                @endif
                            </td>
                            <td>{{$b->tanggal_input}}</td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('barang.edit', $b->id) }}">
                                        <span class="btn-inner">
                                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="btn btn-sm btn-icon">
                                        <form action="{{ route('barang.destroy', $b->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-icon btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this item ?')">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path
                                                            d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </form>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <br>
                <a href="/cetak_barang" button type="button" class="btn btn-primary">Print</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
