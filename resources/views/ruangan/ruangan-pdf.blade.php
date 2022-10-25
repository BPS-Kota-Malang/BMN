<!DOCTYPE html>
<html>

<head>
    <style>
    #ruangan {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #ruangan td,
    #ruangan th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #ruangan tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #ruangan tr:hover {
        background-color: #ddd;
    }

    #ruangan th {
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
        <h2>Laporan Daftar Ruangan</h2>
    </center>

    <table id="ruangan">
        <tr>
            <th>No</th>
            <th>Kode Ruangan</th>
            <th>Nama Ruangan</th>
            <th>Kategori</th>
            <th>Gudang</th>
            <th>Status Ruangan</th>
        </tr>
        <tr>
            @foreach($ruangan as $r)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$r->kode_ruangan}}</td>
            <td>{{$r->nama_ruangan}}</td>
            <td>{{$r->roomcategory->nama_kategruangan}}</td>
            <td>{{$r->building->nama_gedung}}</td>
            <td>{{$r->status_ruangan}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>