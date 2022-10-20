@extends('layouts.index')
@section('title','Tambah Data Merk Barang')

@section('content')
<div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Tambah Merk Barang</h4>
               </div>
            </div>
            <div class="card-body">
                <form action="{{route('merkbarang.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="nm_barang"><b>Kode Merk</b></label>
                        <input type="text" class="form-control" id="nama_barang" name="kode_merk" value="{{ 'MRK-'.$kd }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nm_kategori"><b>Nama Merk</b></label>
                        <input type="text" class="form-control" id="nm_lokasi" name="merk" placeholder="Input merk barang...">
                    </div><br><br>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
         </div>
      </div>
@endsection