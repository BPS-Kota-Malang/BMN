<!DOCTYPE html>
<html>

<head>
    <style>
    #nonaktifproduct {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #nonaktifproduct td,
    #nonaktifproduct th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #nonaktifproduct tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #nonaktifproduct tr:hover {
        background-color: #ddd;
    }

    #nonaktifproduct th {
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
        <div style="font-size: 20px; margin-bottom: 5px;">UNIVERSAL LEAF TOBACCO COMPANY</div>
        <div style="font-size: 24px; margin-bottom: 5px;"><b>PT. Tempu Rejo</b></div>
        <div style="font-size: 14px">Jl. P.B. Sudirman No.110 Kec. Pakusari, Kab. Jember || No. Telp 08xxxxxxxxxx</div>
    </center>
</div>
<hr styles="border: 1px solid black; margin: 10px 5px 10px 5px;">
<body>

    <center>
        <h2>Laporan Data Barang Nonaktif</h2>
    </center>

    <table id="nonaktifproduct">
        <tr>
            <th>NO</th>
            <th>KODE BARANG</th>
            <th>NAMA BARANG</th>
            <th>KATEGORI</th>
            <th>LOKASI</th>
            <th>OWNER</th>
            <th>HARGA BELI</th>
            <th>STATUS</th>
            <th>TANGGAL INPUT</th>
        </tr>
        <tr>
            @foreach($barangnonaktif as $b)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b->kode_barang}}</td>
                    <td>{{$b->nama_barang}} ({{$b->merek->nama_merkbarang}})</td>
                    <td>{{$b->productcategory->nama_kategbarang}}</td>
                    <td>{{$b->lokasi->nama_lokasibarang}} ({{$b->gudang->nama_gedung}})</td>
                    <td>{{$b->departemen->nama_departemen}}</td>
                    <td>{{$b->harga_beli}}</td>
                    <td>{{$b->status->nama_statusbarang}}</td>
                    <td>{{$b->tanggal_input}}</td>
                </tr>
            @endforeach
        </tr>
    </table>

</body>

</html>