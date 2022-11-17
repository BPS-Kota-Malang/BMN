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
                    <label class="form-label" for="nm_barang"><b>Kode BMN</b></label>
                    <input type="text" class="form-control" id="nama_barang" name="kode_barang"   placeholder="Input Kode BMN...">
                    <input type="text" class="form-control" id="nama_barang" name="kode_barang" value="{{ 'BRG-'.$kd }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="nm_barang"><b>Serial Number</b></label>
                    <input type="text" class="form-control" id="serial_number" name="serial_number"
                        placeholder="Input Serial Number...">
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
                        <div class="form-group">

                                    <!-- <div class="form-group">
                                        <label class="form-label" for="hb_barang"><b>Harga Beli</b></label>
                                        <input type="text" class="form-control" id="hargabeli" name="hargabeli"
                                            placeholder="Input harga barang...">
                                    </div> -->
                                     {{-- <div class="form-group">
                                    <label class="form-label" for="jm_barang"><b>Jumlah</b></label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah"
                                        placeholder="Input jumlah barang...">
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label class="form-label" for="jm_barang"><b>Satuan</b></label>
                                    <input type="text" class="form-control" id="satuan" name="satuan"
                                        placeholder="Input satuan barang...">
                                </div> --> --}}
                                {{-- <div class="form-group">
                                    <label class="form-label" for="nm_barang"><b>Keterangan</b></label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Keterangan barang...">
                                </div> --}}
                                    {{-- <div class="form-group">
                                        <label class="form-label"><b>Status</b></label>
                                        <select class="form-select mb-3 shadow-none" name="id_statusbarang"
                                            id="id_statusbarang">
                                            <option selected="false" disabled="disabled">Pilih Status...</option>
                                            @foreach($status as $group)
                                            <optgroup label="{{$group->nama_statusbarang }}">
                                                @foreach ($kondisi as $k)
                                                @if($k->id_statusproduct == $group->id)
                                                    <option value="{{ $k->id}}">{{$k->jenis_kondisi}}</option>
                                                @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                        </select> --}}
                                    <div class="form-group">
                                        <label class="form-label"><b>Status</b></label>
                                        <select class="form-select mb-3 shadow-none" name="id_statusbarang"
                                            id="id_statusbarang">
                                            <option selected="">Pilih Status...</option>
                                             {{-- @foreach ($kondisi as $k)
                                            <option value="{{ $s->id }}">{{ $s->nama_statusbarang }}</option>
                                            @endforeach --}}
                                            {{-- @foreach($status as $s)
                                                    <option  value="{{ $s->id }}">{{ ucfirst($s->nama_statusbarang) }}</option>
                                            @endforeach --}}
                                            @foreach ($status as $s)
                                                <option value="{{ $s->id }}">{{ $s->nama_statusbarang }}</option>
                                            @endforeach
                                        </select>

                                            <div class="form-group" id = "kondisi">
                                                <label class="form-label"><b>kondisi</b></label>
                                                <select name="kondisi" id="kondisi" class="form-select mb-3 shadow-none">
                                                    <option value="">Pilih Kondisi...</option>
                                                    {{-- @foreach ($kondisi as $k)
                                                    <option value="{{ $k->id }}">{{ $k->jenis_kondisi }}</option>
                                                    @endforeach --}}
                                                    <option value="ringan">ringan</option>
                                                    <option value="sedang">sedang</option>
                                                    <option value="berat">berat</option>
                                                </select>

                                            </div>

                                        </div>
                                        {{-- <select class="form-select mb-3 shadow-none" name="id_kondisi"
                                            id="id_kondisi">
                                            <option selected="">Pilih kondisi...</option>
                                            @foreach ($kondisi as $k)
                                            <option value="{{ $k->id }}">{{ $k->jenis_kondisi }}</option>
                                            @endforeach
                                        </select> --}}
                                        <div class="form-group">
                                            <label class="form-label" for="tgl_kembali"><b>Tanggal Input</b></label>
                                            <input type="date" class="form-control" id="tglinput" name="tglinput">
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <button type="submit" class="btn btn-primary">Tambahkan</button>

                                </form>

        </div>
    </div>
    {{-- AJAX CDN --}}

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<script type="text/javascript">

//Ajax Call
$(document).ready(function (){
    $('#id_statusproduct').change(function (){

        //ajax setup
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $(this).val();

        $.ajax({
            type: "RESOURCE"
            url: "barang"+id,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#id_kondisi')(data);
            },
            error: function (error){
                console.log(error);
            }
        });
    });
});

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

{{-- </div> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("#kondisi").hide();
        $('#id_statusbarang').on('change', function() {
            var id = this.value;
            
            if(id == 9){
                $("#kondisi").show();
            }else if(id  == 12){
                $("#kondisi").show();
            }else{
                $("#kondisi").hide();
            }
        });
    });

</script>

</div>
</div>
</div>
</div>
</div>


@endsection
