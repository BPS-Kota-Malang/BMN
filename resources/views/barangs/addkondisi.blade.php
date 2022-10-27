@extends('layouts.index')
@section('title','Tambah Data kondisi')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Kondisi Barang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('kondisibarang.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="nm_kondisi"><b>Kode Kondisi</b></label>
                    <input type="text" class="form-control" id="nama_barang" name="kode_kondisi" value="{{ 'KD-' .$kd }}"
                        readonly>
                </div>

                <div class="form-group">
                    <label class="form-label"><b>Status</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_statusbarang"
                        id="id_statusbarang">
                        <option selected="">Pilih Kondisi...</option>
                        @foreach ($status as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_statusbarang }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label class="form-label"><b>Jenis Kondisi</b></label>
                        <input type="text" class="form-control" id="jenis_kondisi" name="jenis_kondisi"
                            placeholder="Input Jenis Kondisi...">
                    </div>

                {{-- <div class="form-group">
                    <label class="form-label" for="nm_status"><b>Nama Kondisi</b></label>
                    <select class="form-select mb-3 shadow-none" name="kondisibarang" id="id_kondisibarang">
                        <option selected= "">pilih kondisi...</option>
                        {{-- @foreach ($status as $s )
                        <option value="{{ $s->id }}">{{ $s->nama_statusbarang }}</option>
                        @endforeach
                    </select>
                </div> --}}



                <br><br>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection
