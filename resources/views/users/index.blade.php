@extends('layouts.index')
@section('title','Data User')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar User</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA USER</th>
                            <th>EMAIL</th>
                            <th>KONTAK</th>
                            <th>ALAMAT</th>
                            <th>JABATAN</th>
                            <th>ROLE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $us)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$us->name}}</td>
                            <td>{{$us->email}}</td>
                            <td>{{$us->kontak}}</td>
                            <td>{{$us->alamat}}</td>
                            <td>{{$us->jabatan->nama_jabatan}}</td>
                            <td>{{$us->role}}</td>
                        </tr>
                        @endforeach
                </table><br>
                <a href="/cetak_daftaruser" button type="button" class="btn btn-primary">Print</button></a>
            </div>
        </div>
    </div>
</div>
@endsection