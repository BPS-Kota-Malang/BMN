<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;

class HRGAKategoriRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=RoomCategory::orderBy('id','desc')->paginate();
        return view('ruangan.kategoriruangan_hrga', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('room_categories')->select(DB::raw('MAX(RIGHT(kode_kategruangan,4)) as kode'));
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

        return view('ruangan.addkatruangan', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori=new RoomCategory();
        $kategori->kode_kategruangan=$request->kode_kategruangan;
        $kategori->nama_kategruangan=$request->kategoriruangan;
        $kategori->save();
        return redirect('/kategoriruangan');
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
        $kategori = RoomCategory::find($id);
        return view('ruangan.editkatruangan', compact('kategori'));
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
        $kategori = RoomCategory::find($id);
        $kategori->kode_kategruangan=$request->kode_kategruangan;
        $kategori->nama_kategruangan=$request->kategoriruangan;
        $kategori->save();
        return redirect('/kategoriruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = RoomCategory::find($id);
        $kategori->delete();
        return redirect()->route('kategoriruangan.index');
    }

    public function cetak_kategruangan()
    {
        $kategori = RoomCategory::all();

        view()->share('kategoriruangan', $kategori);
        $pdf = PDF::loadview('ruangan.kategoriruangan-pdf');
        return $pdf->stream('data-kategoriruangan.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('kategruangan_hrga')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
