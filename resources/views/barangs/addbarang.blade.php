@extends('layouts.index')
@section('title','Tambah Data Barang')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Barang</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('barang.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="nm_barang"><b>Kode Barang</b></label>
                    <input type="text" class="form-control" id="nama_barang" name="kode_barang" value="{{ 'BRG-'.$kd }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_barang"><b>Nama Barang</b></label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                        placeholder="Input nama barang...">
                </div>
                <div class="form-group">
                    <label class="form-label"><b>Merek Barang</b></label>
                    <select class="form-select mb-3 shadow-none" name="id_merkbarang" id="id_merkbarang">
                        <option selected="">Pilih Merk...</option>
                        @foreach ($merk as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_merkbarang }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label class="form-label"><b>Kategori Barang</b></label>
                        <select class="form-select mb-3 shadow-none" name="id_kategoribarang" id="id_kategoribarang">
                            <option selected="">Pilih Kategori...</option>
                            @foreach ($prodcat as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_kategbarang }}</option>
                            @endforeach
                        </select>
                        {{-- <div class="form-group">
                            <label class="form-label"><b>Lokasi Barang</b></label>
                            <select class="form-select mb-3 shadow-none" name="id_lokasibarang" id="id_lokasibarang">
                                <option selected="">Pilih Lokasi...</option>
                                @foreach ($lokasi as $l)
                                <option value="{{ $l->id }}">{{ $l->nama_lokasibarang }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label class="form-label"><b>Gudang</b></label>
                                <select class="form-select mb-3 shadow-none" name="id_gudang" id="id_lokasibarang">
                                    <option selected="">Pilih Gudang...</option>
                                    @foreach ($gudang as $g)
                                    <option value="{{ $g->id }}">{{ $g->nama_gedung }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label class="form-label"><b>Milik</b></label>
                                    <select class="form-select mb-3 shadow-none" name="id_departemen"
                                        id="id_departemen">
                                        <option selected="">Pilih departemen...</option>
                                        @foreach ($departemen as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
                                        @endforeach
                                    </select> --}}
                                    <!-- <div class="form-group">
                                        <label class="form-label" for="hb_barang"><b>Harga Beli</b></label>
                                        <input type="text" class="form-control" id="hargabeli" name="hargabeli"
                                            placeholder="Input harga barang...">
                                    </div> -->
                                    <!-- <div class="form-group">
                                    <label class="form-label" for="jm_barang"><b>Jumlah</b></label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah"
                                        placeholder="Input jumlah barang...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="jm_barang"><b>Satuan</b></label>
                                    <input type="text" class="form-control" id="satuan" name="satuan"
                                        placeholder="Input satuan barang...">
                                </div> -->
                                    <div class="form-group">
                                        <label class="form-label"><b>Status</b></label>
                                        <select class="form-select mb-3 shadow-none" name="id_statusbarang"
                                            id="id_statusbarang">
                                            <option selected="">Pilih Status...</option>
                                            @foreach ($status as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama_statusbarang }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group">
                                            <label class="form-label" for="tgl_kembali"><b>Tanggal Input</b></label>
                                            <input type="date" class="form-control" id="tglinput" name="tglinput">
                                        </div>
                                    </div><br><br>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection
