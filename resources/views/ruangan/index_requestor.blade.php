@extends('layouts.index')
@section('title','Data Ruangan')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar Ruangan</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE RUANGAN</th>
                            <th>NAMA RUANGAN</th>
                            <th>KATEGORI</th>
                            <th>GUDANG</th>
                            <th>STATUS RUANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requestorruangan as $r)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$r->kode_ruangan}}</td>
                            <td>{{$r->nama_ruangan}}</td>
                            <td>{{$r->roomcategory->nama_kategruangan}}</td>
                            <td>{{$r->building->nama_gedung}}</td>
                            <td>
                                @if ($r->status_ruangan=='Tersedia')
                                        <span class="badge bg-primary">Tersedia</span>
                                @else ($r->status_ruangan=='Dipinjam')
                                        <span class="badge bg-info">Dipinjam</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </table><br>
                <a href="/cetak_ruanganrequestor" button type="button" class="btn btn-primary">Print</button></a>
            </div>
        </div>
    </div>
</div>
@endsection