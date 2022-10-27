<!DOCTYPE html>
<html>

<head>
    <style>
    #statusbarang {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #statusbarang td,
    #statusbarang th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #statusbarang tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #dstatusbarang tr:hover {
        background-color: #ddd;
    }

    #statusbarang th {
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
        <h2>Laporan Daftar Kondisi Barang</h2>
    </center>

    <table id="statusbarang">
        <tr>
            <th>NO</th>
            <th>KODE KONDISI</th>
            <th>KONDISI</th>
            <th>KATEGORI</th>
        </tr>
        <tr>
            @foreach($kondisi as $k)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$k->kode_kondisi}}</td>
            <td>{{$k->nama_kondisibarang}}</td>
            <td>{{$k->kategori}}</td>
        </tr>
        @endforeach
        </tr>
    </table>

</body>

</html>
