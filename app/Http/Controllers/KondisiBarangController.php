<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use Illuminate\Http\Request;
use App\Models\StatusProduct;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;

class KondisiBarangController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jtersedia = Product::where('id_statusproduct', '=', 8)->count();
        // $jdipinjam = Product::where('id_statusproduct', '=', 11)->count();
       $status=StatusProduct::all();
        // $jdiservis = Product::where('id_statusproduct', '=', 12)->count();
        // $jhilang = Product::where('id_statusproduct', '=', 10)->count();

        $kondisi=Kondisi::all();
        return view('barangs.kondisi', compact('kondisi','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = StatusProduct::all();

        $q = DB::table('kondisi_products')->select(DB::raw('MAX(RIGHT(kode_kondisi,4)) as kode'));
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

        return view('barangs.addkondisi', compact('kd','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kondisi::create([
            'kode_kondisi'=>$request->kode_kondisi,
            'jenis_kondisi' => $request->jenis_kondisi,
            'id_statusproduct' => $request->id_statusbarang,


        ]);

        return redirect()->route('kondisibarang.index')->with('toast_success', 'Data Berhasil Tersimpan !');
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
        $kondisi = Kondisi::find($id);
        $status = StatusProduct::all();
        return view ('barangs.editkondisibarang', compact('kondisi','status'));
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
        $kondisi = Kondisi::with('status')->find($id);
        $kondisi->kode_kondisi=$request->kode_kondisi;
        $kondisi->jenis_kondisi=$request->jenis_kondisi;
        $kondisi->id_statusproduct=$request->id_statusbarang;

        $kondisi->save();
        return redirect('/kondisibarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kondisi = Kondisi::with('status')->find($id);
        $kondisi->delete();
        return redirect()->route('kondisibarang.index');
    }

    public function cetak_statusbarang()
    {
        $kondisi = Kondisi::all();

        view()->share('kondisi', $kondisi);
        $pdf = PDF::loadview('barangs.kondisibarang-pdf');
        return $pdf->stream('daftar-kondisibarang.pdf');
    }

    // public function __construct()
    // {
    //     //$this->middleware('auth');
    //     $this->middleware(function($request, $next){
    //     if(Gate::allows('statusbarang')) return $next($request);
    //     abort(403, 'Anda tidak memiliki cukup hak akses!');
    //     });
    // }
}
