<?php

namespace App\Http\Controllers;

use App\Models\NonaktifProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\MerkProduct;
use App\Models\LocationProduct;
use App\Models\StatusProduct;
use PDF;
use DB;

class NonaktifBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $barang = Product::orderBy('id','desc')->where('id_statusproduct', '=' , 9)->orwhere('id_statusproduct', '=' , 10)->get();
        return view('barangs.nonaktif', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $barang = Product::all();
        // $merk = MerkProduct::all();
        // $lokasi = LocationProduct::all();
        // $status = StatusProduct::all();

        
        // $q = DB::table('nonaktif_products')->select(DB::raw('MAX(RIGHT(kode_nonaktif,4)) as kode'));
        // $kd="";
        // if($q->count()>0)
        // {
        //     foreach($q->get() as $k)
        //     {
        //         $tmp = ((int)$k->kode)+1;
        //         $kd = sprintf("%04s", $tmp);
        //     }
        // }
        // else{
        //     $kd = "0001";
        // }
        
        
        
        
        return view ('barangs.addnonaktif', compact('barang','merk','lokasi','status','kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // NonaktifProduct::create([
        //     'kode_nonaktif' => $request->kode_nonaktif,
        //     'deskripsi' => $request->deskripsi,
        //     'jumlah' => $request->jumlah,
        //     'tanggal_nonaktif' => $request->tanggal_nonaktif,
        //     'id_product' => $request->id_product,
        //     'id_merk' => $request->id_merk,
        //     'id_lokasi' => $request->id_lokasi,
        //     'id_status' => $request->id_status,


        // ]);

        return redirect()->route('nonaktif.index')->with('toast_success', 'Data Berhasil Tersimpan !');
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
        // $nonaktif = NonaktifProduct::with('barang','merk','lokasi','status')->find($id);
        // $barang=Product::all();
        // $merk=MerkProduct::all();
        // $lokasi=LocationProduct::all();
        // $status=StatusProduct::all();

        return view('barangs.editnonaktifbarang', compact('nonaktif','barang','merk','lokasi','status'));
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
        // $nonaktif=NonaktifProduct::with('barang', 'merk','lokasi','status')->find($id);
        // $nonaktif->kode_nonaktif=$request->kode_nonaktif;
        // $nonaktif->deskripsi=$request->deskripsi;
        // $nonaktif->jumlah=$request->jumlah;
        // $nonaktif->tanggal_nonaktif=$request->tanggal_nonaktif;
        // $nonaktif->id_product=$request->id_product;
        // $nonaktif->id_merk=$request->id_merk;
        // $nonaktif->id_lokasi=$request->id_lokasi;
        // $nonaktif->id_status=$request->id_status;
        // $nonaktif->save();
        // return redirect('/nonaktif'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $nonaktif = NonaktifProduct::with('barang', 'merk','lokasi','status')->find($id);
        // $nonaktif->delete();
        // return redirect()->route('nonaktif.index');
    }

    public function cetak_barangnonaktif()
    {
        $nonaktif = Product::orderBy('id','desc')->where('id_statusproduct', '=' , 9)->orwhere('id_statusproduct', '=' , 10)->get();

        view()->share('barangnonaktif', $nonaktif);
        $pdf = PDF::loadview('barangs.nonaktif-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('data-barangnonaktif.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('nonaktif')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
