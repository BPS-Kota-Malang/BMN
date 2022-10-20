<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\BorrowRoom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use PDF;
use DB;

class HRGAPinjamRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reqpinjam = BorrowRoom::where('id_user', Auth::user()->id)->orderBy('id','desc')->get();
        return view('ruangan.statuspeminjamanruangan_hrga', compact('reqpinjam'));
    }

    public function index_pjruangan()
    {
        $reqpinjam=BorrowRoom::where('status','=','sedang diajukan')->where('petugas','=', Auth::user()->id)->orderBy('id','desc')->get();
        $reqpinjamconfirmed=BorrowRoom::where('status','!=','sedang diajukan')->orderBy('id','desc')->get();
        return view('ruangan.peminjamanruangan_hrga', compact(['reqpinjam','reqpinjamconfirmed']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangan = Room::where('status_ruangan', '=' , 'Tersedia')->get();
        $petugas = User::where('role', '=' , 'pjruangan')->get();

        $q = DB::table('borrow_rooms')->select(DB::raw('MAX(RIGHT(kode_peminjaman,4)) as kode'));
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

        return view('ruangan.hrga_peminjamanruangan', compact('ruangan',  'kd', 'petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruangan= Room::find($request->nama_ruangan);
        BorrowRoom::create([
            'id' => $request->id,
            'kode_peminjaman' => $request->kode_peminjaman,
            'nama_peminjam' => $request->nama_peminjam,
            'petugas' => $request->petugas,
            'id_room' => $request->nama_ruangan,
            'id_user' => Auth::user()->id,
            'deskripsi' => $request->deskripsi,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,

        ]);

        $ruangan->status_ruangan='sedang diajukan';
        $ruangan->save();

        $q = DB::table('borrow_rooms')->select(DB::raw('MAX(RIGHT(kode_peminjaman,4)) as kode'));
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

        return redirect()->route('statuspinjamruangan_hrga.index')->with('toast_success', 'Data Berhasil Tersimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reqpinjam = BorrowRoom::find($id);
        $ruangan = Room::where('status_ruangan', '=' , 'Tersedia')->get();
        $petugas = User::where('role', '=' , 'pjruangan')->get();

        return view('ruangan.editajukanpeminjaman', compact('reqpinjam', 'ruangan',  'petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ruangan= Room::find($request->nama_ruangan);
        $reqpinjam = BorrowRoom::find($id);
        $reqpinjam->id_room=$request->nama_ruangan;
        $reqpinjam->petugas=$request->petugas;
        $reqpinjam->deskripsi=$request->deskripsi;
        $reqpinjam->tanggal_pinjam=$request->tanggal_pinjam;
        $reqpinjam->tanggal_selesai=$request->tanggal_selesai;
        $reqpinjam->save();

        if($request->ruangan_lama!=$reqpinjam->id_room)
        {
            //mengubah status ruangan lama menjadi tersedia
            $ruanganlama=Room::find($request->ruangan_lama);
            $ruanganlama->status_ruangan="Tersedia";
            $ruanganlama->save();


        }
        //mengubah status ruangan baru menjadi diajukan
        $ruangan->status_ruangan="diajukan";
        $ruangan->save();

        return redirect('/statuspinjamruangan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reqpinjam = BorrowRoom::with('ruangan')->find($id);
        $ruangan = Room::find($reqpinjam->id_room);
        $ruangan->status_ruangan='Tersedia';
        $ruangan->save();
        $reqpinjam->delete();
        return redirect()->route('statuspinjamruangan_hrga.index');

    }

    public function approve($id)
    {
        $approve=BorrowRoom::find($id);
        $approve->status='disetujui';
        $approve->save();

        $ruangan=Room::find($approve->id_room);
        $ruangan->status_ruangan='Dipinjam';
        $ruangan->save();

        return redirect()->action([PinjamRuanganController::class, 'index_pjruangan']);

    }

    public function rejected($id)
    {
        $rejected=BorrowRoom::find($id);
        $rejected->status='ditolak';
        $rejected->save();

        $ruangan=Room::find($rejected->id_room);
        $ruangan->status_ruangan='Tersedia';
        $ruangan->save();

        return redirect()->action([PinjamRuanganController::class, 'index_pjruangan']);

    }

    public function return(Request $request, $id)
    {
        $return=BorrowRoom::find($id);
        $return->status='selesai';
        $return->tgl_selesai=Carbon::now()->format('Ymd');
        $return->save();

        $ruangan=Room::find($request->id_room);
        $ruangan->status_ruangan="Tersedia";
        $ruangan->save();

        return redirect()->back();
    }

    public function cetak_pinjamruangan()
    {
        $reqpinjam = BorrowRoom::where('id_user', Auth::user()->id)->orderBy('id','desc')->paginate();

        view()->share('pinjamruangan', $reqpinjam);
        $pdf = PDF::loadview('ruangan.pinjamruangan-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('data-pinjamruangan.pdf');
    }

    public function cetak_riwayatpinjamruangan()
    {
        $reqpinjam = BorrowRoom::all();

        view()->share('riwayatpinjamruangan', $reqpinjam);
        $pdf = PDF::loadview('ruangan.riwayatpinjamruangan-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('data-riwayatpinjamruangan.pdf');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}

