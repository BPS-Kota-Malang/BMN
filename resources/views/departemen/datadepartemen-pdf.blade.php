<!DOCTYPE html>
<html>

<head>
    <style>
    #departments {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #departments td,
    #departments th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #departments tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #departments tr:hover {
        background-color: #ddd;
    }

    #departments th {
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
        <h2>Laporan Data Departemen</h2>
    </center>

    <table id="departments">
        <tr>
            <th>No</th>
            <th>Kode Departemen</th>
            <th>Nama Departemen</th>
        </tr>
        <tr>
            @foreach($departemen as $dp)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dp->kode_departemen}}</td>
            <td>{{$dp->nama_departemen}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>