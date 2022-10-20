<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BorrowProduct;
use App\Models\MerkProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use PDF;
use DB;

class HRGAPinjamBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //tampilan halaman status peminjaman pada role "requestor"
    public function index()
    {

        $reqpinjam=BorrowProduct::where('id_user', Auth::user()->id)->orderBy('id','desc')->get();
        return view('barangs.statuspeminjamanbarang_hrga', compact('reqpinjam'));
    }

    //tampilan halaman peminjaman pada role "pjbarang"
    public function index_pjbarang()
    {

        $reqpinjam=BorrowProduct::where('status','=','diajukan')->where('petugas','=', Auth::user()->id)->orderBy('id','desc')->get();
        $reqpinjamconfirmed=BorrowProduct::where('status','!=','diajukan')->orderBy('id','desc')->get();

        return view('barangs.peminjamanbarang_hrga', compact(['reqpinjam','reqpinjamconfirmed']));
    }

    public function index_pengembalian($id)
    {
        $pengembalian=BorrowProduct::find($id);


        return view('barangs.lihatbuktipengembalian', compact(['pengembalian']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //proses menampilkan daftar barang dengan status "tersedia" dan "diajukan"
        $barang = Product::where('id_statusproduct', '=',1)->get();
        $petugas = User::where('role', '=', 'pjbarang' )->get();

        //membuat kode peminjaman barang
        $q = DB::table('borrow_products')->select(DB::raw('MAX(RIGHT(kode_peminjaman,4)) as kode'));
        $kd="";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else{
            $kd = "0001";
        }
        //////////////////////////////////////



        return view('barangs.hrgapeminjamanbarang', compact('barang','kd','petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //proses requestor menyimpan data ajukan peminjaman barang
    public function store(Request $request)
    {
        $barang= Product::find($request->nama_barang);
        BorrowProduct::create([
            'id' => $request->id,
            'kode_peminjaman' => $request->kode_peminjaman,
            'nama_peminjam' => $request->nama_peminjam,
            'petugas' => $request->petugas,
            'id_product' => $request->nama_barang,
            'id_merk' => $barang->id_merkproduct,
            'id_user' => Auth::user()->id,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
            // 'kondisi_setelahdipinjam'=>$request->kondisi_setelahpinjam,
            // 'catatan'=>$request->catatan,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,

        ]);

        //proses mengubah status pada daftar barang menjadi 'diajukan' setelah requestor mengajukan peminjaman
        $barang->id_statusproduct='Diajukan';
        $barang->save();



        return redirect()->route('statuspinjambarang.index')->with('toast_success', 'Data Berhasil Tersimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //proses requestor mengedit data pengajuan
    public function edit($id)
    {
        $reqpinjam=BorrowProduct::find($id);
        $barang = Product::where('id_statusproduct', '=' , 1)->get();
        $petugas = User::where('role', '=' , 'pjbarang')->get();

        return view('barangs.editajukanpeminjaman', compact('reqpinjam','barang','petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //proses requestor mengupdate perubahan data pengajuan
    public function update(Request $request, $id)
    {
        $barang= Product::find($request->nama_barang);
        $reqpinjam = BorrowProduct::find($id);
        $reqpinjam->id_product=$request->nama_barang;
        $reqpinjam->id_merk=$barang->id_merkproduct;
        $reqpinjam->jumlah=$request->jumlah;
        $reqpinjam->petugas=$request->petugas;
        $reqpinjam->deskripsi=$request->deskripsi;
        $reqpinjam->tanggal_pinjam=$request->tanggal_pinjam;
        // $reqpinjam->tanggal_pengembalian=$request->tanggal_pengembalian;
        $reqpinjam->tanggal_kembali=$request->tanggal_kembali;
        $reqpinjam->save();


        if($request->barang_lama!=$reqpinjam->id_product)
        {
            //mengubah status barang lama menjadi tersedia
            $baranglama=Product::find($request->barang_lama);
            $baranglama->id_statusproduct=1;
            $baranglama->save();


        }
        //mengubah status barang baru menjadi diajukan
        $barang->id_statusproduct=3;
        $barang->save();


        return redirect('/statuspinjambarang');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //proses requestor menghapus data pengajuan ketika statusnya masih 'diajukan'
    public function destroy($id)
    {
        $reqpinjam=BorrowProduct::find($id);
        $barang = Product::find($reqpinjam->id_product);
        $barang->id_statusproduct=3;
        $barang->save();
        $reqpinjam->delete();


        return redirect()->route('statuspinjambarang.index');

    }

    //proses menyetujui peminjaman barang
    public function approve($id)
    {
        //proses mengubah status pada riwayat peminjaman menjadi "disetujui"
        $approve=BorrowProduct::find($id);
        $approve->status='disetujui';
        $approve->save();

        //proses mengubah status pada daftar barang menjadi "dipinjam"
        $product=Product::find($approve->id_product);
        $product->id_statusproduct=4 ;
        $product->save();


        return redirect()->action([PinjamBarangController::class, 'index_pjbarang']);

    }

       //proses menolak peminjaman barang
    public function rejected($id)
    {
         //proses mengubah status pada riwayat peminjaman menjadi "ditolak"
        $rejected=BorrowProduct::find($id);
        $rejected->status='ditolak';
        $rejected->save();


        //proses mengubah status pada daftar barang menjadi "tersedia"
        $product=Product::find($rejected->id_product);
        $product->id_statusproduct=1;
        $product->save();


        return redirect()->action([PinjamBarangController::class, 'index_pjbarang']);

    }

    public function return(Request $request, $id)
    {
        $return=BorrowProduct::find($id);
        $return->status='sudah dikembalikan';
        $return->tanggal_pengembalian=Carbon::now()->format('Ymd');
        $return->save();

        $product=Product::find($request->id_product);
        $product->id_statusproduct=1;
        $product->save();

        return redirect()->back();
    }

    public function buktipengembalian_create($id)
    {
        $pengembalian=BorrowProduct::find($id);


        return view('barangs.uploadbuktipengembalian', compact('pengembalian'));

    }

    public function buktipengembalian_store(Request $request, $id)
    {
        $peminjaman = BorrowProduct::find($id);
        $peminjaman->status="sudah dikembalikan dengan bukti";
        $peminjaman->update([
            'petugas' => Auth::user()->id,
            'kondisi_setelahdipinjam' => $request->kondisi,
            'catatan' => $request->catatan,
            // 'bukti_pengembalian' => $request->fotobukti,
        ]);
        $peminjaman->save();

        return redirect()->action([PinjamBarangController::class, 'index_pjbarang']);

    }

    public function cetak_pinjambarang()
    {
        $reqpinjam = BorrowProduct::where('id_user', Auth::user()->id)->orderBy('id','desc')->paginate();

        view()->share('pinjambarang', $reqpinjam);
        $pdf = PDF::loadview('barangs.pinjambarang-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('data-pinjambarang.pdf');
    }

    public function cetak_riwayatpinjambarang()
    {
        $reqpinjam = BorrowProduct::all();

        view()->share('riwayatpinjambarang', $reqpinjam);
        $pdf = PDF::loadview('barangs.riwayatpinjambarang-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('data-riwayatpinjambarang.pdf');
    }

    public function cetak_buktipengembalianbarang($id)
    {
        $pengembalianbarang = BorrowProduct::find($id);

        view()->share('pengembalianbarang', $pengembalianbarang);
        $pdf = PDF::loadview('barangs.buktipengembalian-pdf')->setPaper('a4', 'potrait');
        return $pdf->stream('data-buktipengembalianbarang.pdf');
    }

    public function __construct()
    {

        $this->middleware('auth');

    }
}
