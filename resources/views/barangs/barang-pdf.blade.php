<!DOCTYPE html>
<html>

<head>
    <style>
    #barang {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #barang td,
    #barang th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #barang tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #barang tr:hover {
        background-color: #ddd;
    }

    #barang th {
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
        <h2>Laporan Daftar Barang</h2>
    </center>

    <table id="barang">
        <tr>
            <th>No</th>
            <th>Kode BMN</th>
            <th>Nama Barang</th>
            <!-- <th>Merk</th> -->
            <th>Kategori</th>
            <!-- <th>Harga Beli</th> -->
            <!-- <th>Jumlah</th>
            <th>Satuan</th> -->
            <th>Status</th>
            <th>Tanggal Input</th>
        </tr>
        <tr>
            @foreach($barang as $b)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$b->kode_barang}}</td>
            <td>{{$b->nama_barang}} ({{$b->merek->nama_merkbarang}})</td>
            <td>{{$b->productcategory->nama_kategbarang}}</td>
            <!-- <td>{{$b->harga_beli}}</td> -->
            <!-- <td>{{$b->jumlah}}</td>
            <td>{{$b->satuan}}</td> -->
            <td>{{$b->status->nama_statusbarang}}</td>
            <td>{{$b->tanggal_input}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>
