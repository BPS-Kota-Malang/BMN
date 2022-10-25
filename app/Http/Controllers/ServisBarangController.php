<?php

namespace App\Http\Controllers;

use App\Models\ServiceProduct;
use App\Models\Product;
use App\Models\MerkProduct;
use App\Models\LocationProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;

class ServisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servis=ServiceProduct::orderBy('id','desc')->paginate();
        return view('barangs.servis', compact('servis'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Product::where('id_statusproduct', '=' , 8)->get();
       

        
        $q = DB::table('service_products')->select(DB::raw('MAX(RIGHT(kode_servis,4)) as kode'));
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
        
        
        
        
        return view ('barangs.addservis', compact('barang','kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang= Product::find($request->id_product);
        ServiceProduct::create([
            'kode_servis' => $request->kode_servis,
            'deskripsi' => $request->deskripsi,
            'nama_petugas' => $request->nama_petugas,
            'tanggal_servis' => $request->tanggal_servis,
            'tanggal_kembali' => $request->tanggal_kembali,
            'id_product' => $request->id_product,
            'id_merk' => $barang->id_merkproduct,
            'id_lokasi' => $barang->id_lokasiproduct,
            'id_gudang' => $barang->id_gudang,
            'id_user' => Auth::user()->id,


        ]);

        $barang->id_statusproduct=12;
        $barang->save();

        return redirect()->route('servis.index')->with('toast_success', 'Data Berhasil Tersimpan !');
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
        $servis = ServiceProduct::find($id);
        $barang=Product::where('id_statusproduct', '=' , 8)->get();
      

        return view('barangs.editservisbarang', compact('servis','barang'));
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
        $barang= Product::find($request->id_product);
        $servis=ServiceProduct::find($id);
        $servis->kode_servis=$request->kode_servis;
        $servis->deskripsi=$request->deskripsi;
        $servis->nama_petugas=$request->nama_petugas;
        $servis->tanggal_servis=$request->tanggal_servis;
        $servis->tanggal_kembali=$request->tanggal_kembali;
        $servis->id_product=$request->id_product;
        $servis->id_merk=$barang->id_merkproduct;
        $servis->id_lokasi=$barang->id_lokasiproduct;
        $servis->id_gudang=$barang->id_gudang;
        $servis->save();

        $statbarang = Product::find($servis->id_product);
        $statbarang->id_statusproduct=12;
        $barang->id_statusproduct=8;
        $barang->save();
        $statbarang->save();
        return redirect('/servis'); 

        // return $request; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servis = ServiceProduct::find($id);
        $barang = Product::find($servis->id_product);
        $barang->id_statusproduct=8;
        $barang->save();
        $servis->delete();

        return redirect()->route('servis.index');
    }

    public function cetak_servisbarang()
    {
        $servis = ServiceProduct::all();

        view()->share('servisbarang', $servis);
        $pdf = PDF::loadview('barangs.servis-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('data-servisbarang.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('servis')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
