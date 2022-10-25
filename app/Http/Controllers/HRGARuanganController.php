<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;

class HRGARuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = DB::table('rooms')->select(DB::raw('MAX(RIGHT(kode_ruangan,4)) as kode'));
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

        $ruangan = Room::orderBy('id','desc')->paginate();
        return view('ruangan.index_hrga', compact('ruangan', 'kd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('rooms')->select(DB::raw('MAX(RIGHT(kode_ruangan,4)) as kode'));
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

        $roomcat = RoomCategory::all();
        $building = Building::all();
        return view ('ruangan.add', compact('roomcat', 'building', 'kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Room::create([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'status_ruangan' => $request->status_ruangan,
            'id_roomcategory' => $request->id_kategoriruangan,
            'id_building' => $request->id_gudang,
        ]);

        return redirect()->route('ruangan.index')->with('toast_success', 'Data Berhasil Tersimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomcat = RoomCategory::all();
        $gudang = Building::all();
        $room = Room::with('roomcategory','building')->find($id);

        return view ('ruangan.edit', compact('room', 'roomcat', 'gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::with('roomcategory','building')->find($id);
        $room->kode_ruangan=$request->kode_ruangan;
        $room->nama_ruangan=$request->nama_ruangan;
        $room->status_ruangan=$request->status_ruangan;
        $room->id_roomcategory=$request->id_kategoriruangan;
        $room->id_building=$request->id_gudang;
        $room->save();
        return redirect('/ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::with('roomcategory', 'building')->find($id);
        $room->delete();
        return redirect()->route('ruangan.index');
    }

    public function cetak_ruangan()
    {
        $room = Room::all();

        view()->share('ruangan', $room);
        $pdf = PDF::loadview('ruangan.ruangan-pdf');
        return $pdf->stream('daftar-ruangan.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('ruangan_hrga')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}