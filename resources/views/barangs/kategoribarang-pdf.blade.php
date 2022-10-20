<!DOCTYPE html>
<html>

<head>
    <style>
    #productcategory {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #productcategory td,
    #productcategory th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #productcategory tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #productcategory tr:hover {
        background-color: #ddd;
    }

    #productcategory th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #3383F1;
        color: white;
    }
    </style>
</head>
{{-- <img src="image/logo.png" style="float: left; heght:60px"> --}}
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
        <h2>Laporan Data Kategori Barang</h2>
    </center>

    <table id="productcategory">
        <tr>
            <th>No</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori Barang</th>
        </tr>
        <tr>
            @foreach($kategoribarang as $k)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$k->kode_kategori}}</td>
            <td>{{$k->nama_kategbarang}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>
