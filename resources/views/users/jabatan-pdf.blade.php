<!DOCTYPE html>
<html>

<head>
    <style>
    #jabatan {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #jabatan td,
    #jabatan th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #jabatan tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #jabatan tr:hover {
        background-color: #ddd;
    }

    #jabatan th {
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
        <h2>Laporan Data Jabatan</h2>
    </center>

    <table id="jabatan">
        <tr>
            <th>No</th>
            <th>Kode Jabatan</th>
            <th>Nama Jabatan</th>
        </tr>
        <tr>
            @foreach($jabatanuser as $pr)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$pr->kode_jabatan}}</td>
            <td>{{$pr->nama_jabatan}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>