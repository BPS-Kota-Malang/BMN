@extends('layouts.index')
@section('title','Edit Data Nonaktif')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit Nonaktif</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('nonaktif/'.$nonaktif->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="form-label" for="kd_servis"><b>Kode Nonaktif</b></label>
                    <input type="text" class="form-control" id="kd_servis" name="kode_nonaktif"
                        value="{{ $nonaktif->kode_nonaktif }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Nama Barang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_product" id="id_product">
                        <option disabled value>Pilih Barang...</option>
                        <option value="{{ $nonaktif->id_product }}">{{ $nonaktif->barang->nama_barang }}</option>
                        @foreach ($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label class="form-label"><b>Merek Barang</b></label>
                        <select class="form-select mb-3 shadow-none" name="id_merk" id="id_merk">
                            <option disabled value>Pilih Merk...</option>
                            <option value="{{ $nonaktif->id_merk }}">{{ $nonaktif->merk->nama_merkbarang }}</option>
                            @foreach ($merk as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_merkbarang }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label class="form-label"><b>Lokasi Barang</b></label>
                            <select class="form-select mb-3 shadow-none" name="id_lokasi" id="id_lokasi">
                                <option disabled value>Pilih Lokasi...</option>
                                <option value="{{ $nonaktif->id_lokasi }}">{{ $nonaktif->lokasi->nama_lokasibarang }}
                                </option>
                                @foreach ($lokasi as $l)
                                <option value="{{ $l->id }}">{{ $l->nama_lokasibarang }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label class="form-label"><b>Status Barang</b></label>
                                <select class="form-select mb-3 shadow-none" name="id_status" id="id_lokasi">
                                    <option disabled value>Pilih Status...</option>
                                    <option value="{{ $nonaktif->id_status }}">
                                        {{ $nonaktif->status->nama_statusbarang }}</option>
                                    @foreach ($status as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_statusbarang }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label class="form-label" for="deskripsi"><b>Deskripsi</b></label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                        value="{{ $nonaktif->deskripsi }}" placeholder="Input deskripsi...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="jumlah"><b>Jumlah</b></label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah"
                                        value="{{ $nonaktif->jumlah }}" placeholder="Input jumlah...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="tgl_nonaktif"><b>Tanggal Nonaktif</b></label>
                                    <input type="date" class="form-control" id="tgl_nonaktif" name="tanggal_nonaktif"
                                        value="{{ $nonaktif->tanggal_nonaktif }}">
                                </div><br><br>
                                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection