@extends('layouts.index')
@section('title','Edit Data Ruangan')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Ruangan</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('ruangan/'.$room->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="kd_ruangan"><b>Kode Ruangan</b></label>
                    <input type="text" class="form-control" id="kd_ruangan" name="kode_ruangan"
                        value="{{ $room->kode_ruangan }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_ruang"><b>Nama Ruangan</b></label>
                    <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan"
                        value="{{ $room->nama_ruangan }}" placeholder="Input nama ruangan...">
                </div>
                <div class="form-group">
                    <label class="form-label" for="sts_ruang"><b>Status Ruangan</b></label>
                    <input type="text" class="form-control" id="sts_ruangan" name="status_ruangan"
                        value="{{ $room->status_ruangan }}" >
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Kategori Ruangan</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_kategoriruangan" id="id_kategoriruangan">
                        <option disabled value>Pilih Kategori...</option>
                        <option value="{{ $room->id_roomcategory }}">{{ $room->roomcategory->nama_kategruangan }}
                        </option>
                        @foreach ($roomcat as $rc)
                        <option value="{{ $rc->id }}">{{ $rc->nama_kategruangan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Gudang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_gudang" id="id_gudang">
                        <option disabled value>Pilih Gudang...</option>
                        <option value="{{ $room->id_building }}">{{ $room->building->nama_gedung }}</option>
                        @foreach ($gudang as $gd)
                        <option value="{{ $gd->id }}">{{ $gd->nama_gedung }}</option>
                        @endforeach
                    </select>
                </div><br><br>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection