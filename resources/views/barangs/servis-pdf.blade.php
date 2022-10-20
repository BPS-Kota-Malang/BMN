<!DOCTYPE html>
<html>

<head>
    <style>
    #serviceproduct {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #serviceproduct td,
    #serviceproduct th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #serviceproduct tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #serviceproduct tr:hover {
        background-color: #ddd;
    }

    #serviceproduct th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #3383F1;
        color: white;
    }
    </style>
</head>
<div style="margin-left: 20px">
    <center>
        <div style="font-size: 20px; margin-bottom: 5px;">Badan Pusat Statistik Kota Malang</div>
        <div style="font-size: 24px; margin-bottom: 5px;"><b>Peminjaman BMN</b></div>
        <div style="font-size: 14px">Jl. Janti Bar. No.47, Bandungrejosari, Kec. Sukun, Kota Malang, Jawa Timur 65148 || No. Telp: 0341 801164</div>
    </center>
</div>
<hr styles="border: 1px solid black; margin: 10px 5px 10px 5px;">
<body>

    <center>
        <h2>Laporan Data Barang di Servis</h2>
    </center>

    <table id="serviceproduct">
        <tr>
            <th>No</th>
            <th>KODE SERVIS</th>
            <th>NAMA BARANG</th>
            <th>DESKRIPSI</th>
            <th>NAMA PETUGAS</th>
            <th>TANGGAL SERVIS</th>
            <th>TANGGAL KEMBALI</th>
        </tr>
        <tr>
            @foreach($servisbarang as $s)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$s->kode_servis}}</td>
            <td>{{$s->barang->kode_barang }} - {{ $s->barang->nama_barang }} ({{ $s->merk->nama_merkbarang }})</td>
            <td>{{$s->lokasi->nama_lokasibarang}} ({{$s->gudang->nama_gedung}})</td>
            <td>{{$s->deskripsi}}</td>
            <td>{{$s->nama_petugas}}</td>
            <td>{{$s->tanggal_servis}}</td>
            <td>{{$s->tanggal_kembali}}</td>
        </tr>
        @endforeach
        </tr>
    </table>

</body>

</html>
