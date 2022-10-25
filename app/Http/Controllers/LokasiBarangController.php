<?php

namespace App\Http\Controllers;

use App\Models\LocationProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;


class LokasiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi=LocationProduct::orderBy('id','desc')->paginate();
        return view('barangs.lokasi', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $q = DB::table('location_products')->select(DB::raw('MAX(RIGHT(kode_lokasi,4)) as kode'));
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
       
    
        return view('barangs.addlokasi', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lokasi=new LocationProduct();
        $lokasi->kode_lokasi=$request->kode_lokasi;
        $lokasi->nama_lokasibarang=$request->lokasi;
        $lokasi->save();
        return redirect('/lokasibarang');
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
       
       

        $lokasi = LocationProduct::find($id);
        return view ('barangs.editlokasi', compact('lokasi'));
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
        $lokasi = LocationProduct::find($id);
        $lokasi->kode_lokasi=$request->kode_lokasi;
        $lokasi->nama_lokasibarang=$request->lokasi;
        $lokasi->save();
        return redirect('/lokasibarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = LocationProduct::find($id);
        $lokasi->delete();
        return redirect()->route('lokasibarang.index');
    }

    public function cetak_lokasibarang()
    {
        $lokasi = LocationProduct::all();

        view()->share('lokasibarang', $lokasi);
        $pdf = PDF::loadview('barangs.lokasibarang-pdf');
        return $pdf->stream('data-lokasi.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('lokbarang')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
