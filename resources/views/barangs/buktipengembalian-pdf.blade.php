<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pengembalian Aset Barang</title>
    <style type="text/css">
    table {
        border-style: double;
        border-width: 8px;
        border-color: white;
    }

    table tr .text2 {
        text-align: left;
        font-size: 15px;
    }

    table tr .text {
        text-align: center;
        font-size: 15px;
    }

    table tr td {
        font-size: 15px;
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
    <!-- <img src="{{ asset('imageuser/Universal PT Tempu Rejo.PNG') }}" alt="" style="width: 35px; border-radius:100px;" > -->
        <h3>Laporan Bukti Pengembalian Aset Barang</h1>
    </center>
    <center>
        <table>
            <tr >
                <td width="200">Nama Peminjam</td>
                <td >: {{ $pengembalianbarang->nama_peminjam }}</td>
            </tr>
            <tr>
                <td>Kode Peminjaman</td>
                <td >: {{ $pengembalianbarang->kode_peminjaman }}</td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td >: {{ $pengembalianbarang->barang->kode_barang }} -
                    {{ $pengembalianbarang->barang->nama_barang }} ({{ $pengembalianbarang->merk->nama_merkbarang }})
                </td>
            </tr>
            {{-- <tr>
                <td>Lokasi Barang</td>
                <td >: {{$pengembalianbarang->lokasi->nama_lokasibarang}}
                    ({{$pengembalianbarang->gudang->nama_gedung}})</td>
            </tr>
            <tr>
                <td>Milik</td>
                <td >: {{$pengembalianbarang->departemen->nama_departemen}}</td>
            </tr>
            <tr>
                <td>Keperluan</td>
                <td >: {{$pengembalianbarang->deskripsi}}</td>
            </tr> --}}
            <tr>
                <td>Petugas Penanggung Jawab Aset IT</td>
                <td >: {{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td >: {{$pengembalianbarang->tanggal_pinjam}}</td>
            </tr>
            <tr>
                <td>Jatuh Tempo</td>
                <td >: {{$pengembalianbarang->tanggal_kembali}}</td>
            </tr>
            <tr>
                <td>Tanggal Pengembalian</td>
                <td >: {{$pengembalianbarang->tanggal_pengembalian}}</td>
            </tr>
            <tr>
                <td>Kondisi Barang Setelah Dipinjam</td>
                <td >: {{ $pengembalianbarang->kondisi_setelahdipinjam }}</td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td >: {{ $pengembalianbarang->catatan }}</td>
            </tr>
            <!-- <tr>
                <td>Bukti Pengembalian</td>
                <td >: {{ $pengembalianbarang->bukti_pengembalian }}</td>
            </tr> -->
        </table>
        <br>

        <table width="500">
            <tr>
                <td width="400"><br><br></td>
                <td class="text" align="center">Peminjam<br><br><br><br><br>(...................................)</td>
            </tr>
        </table>
    </center>
</body>

</html>
