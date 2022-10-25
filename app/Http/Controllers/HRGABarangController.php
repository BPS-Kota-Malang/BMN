<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\BorrowProduct;
use App\Models\ProductCategory;
use App\Models\MerkProduct;
use App\Models\LocationProduct;
use App\Models\Department;
use App\Models\StatusProduct;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;

class HRGABarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jtersedia = Product::where('id_statusproduct', '=', 8)->count();
        $jdipinjam = Product::where('id_statusproduct', '=', 11)->count();
        $jrusak = Product::where('id_statusproduct', '=', 9)->count();
        $jdiservis = Product::where('id_statusproduct', '=', 12)->count();
        $jhilang = Product::where('id_statusproduct', '=', 10)->count();
        $barang_hrga = Product::orderBy('id','desc')->get();
        return view('barangs.index_hrga', compact('barang_hrga','jtersedia','jdipinjam','jrusak','jhilang','jdiservis'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodcat = ProductCategory::all();
        $merk = MerkProduct::all();
        $lokasi = LocationProduct::all();
        $gudang = Building::all();
        $departemen = Department::all();
        $status = StatusProduct::all();


        $q = DB::table('products')->select(DB::raw('MAX(RIGHT(kode_barang,4)) as kode'));
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

        return view ('barangs.addbarang', compact('prodcat', 'merk', 'lokasi', 'gudang', 'departemen', 'status', 'kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_merkproduct' => $request->id_merkbarang,
            'id_productcategory' => $request->id_kategoribarang,
            'id_lokasiproduct' => $request->id_lokasibarang,
            'id_gudang' => $request->id_gudang,
            'id_department' => $request->id_departemen,
            // 'harga_beli' => $request->hargabeli,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'id_statusproduct' => $request->id_statusbarang,
            'tanggal_input' => $request->tglinput,

        ]);

        return redirect()->route('barang.index')->with('toast_success', 'Data Berhasil Tersimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Product::with('productcategory', 'merek','lokasi', 'departemen', 'status', 'gudang')->find($id);
        $prodcat = ProductCategory::all();
        $merk = MerkProduct::all();
        $lokasi = LocationProduct::all();
        $departemen = Department::all();
        $status = StatusProduct::all();
        $gudang = Building::all();
       

        return view ('barangs.editbarang', compact('prod', 'prodcat', 'merk', 'lokasi', 'departemen', 'status','gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Product::with('productcategory', 'merek','lokasi', 'departemen', 'status')->find($id);
        $prod->kode_barang=$request->kode_barang;
        $prod->nama_barang=$request->nama_barang;
        $prod->id_merkproduct=$request->id_merkbarang;
        $prod->id_productcategory=$request->id_kategoribarang;
        $prod->id_lokasiproduct=$request->id_lokasibarang;
        $prod->id_gudang=$request->id_gudang;
        $prod->id_department=$request->id_departemen;
        // $prod->harga_beli=$request->hargabeli;
        $prod->jumlah=$request->jumlah;
        $prod->satuan=$request->satuan;
        $prod->id_statusproduct=$request->id_statusbarang;
        $prod->tanggal_input=$request->tglinput;
        $prod->save();
        return redirect('/barang');
      
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::with('productcategory', 'merek','lokasi', 'departemen', 'status')->find($id);
        $prod->delete();
        return redirect()->route('barang.index');
    }

    public function cetak_barang()
    {
        $prod = Product::all();

        view()->share('barang', $prod);
        $pdf = PDF::loadview('barangs.barang-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('daftar-barang.pdf');
    }

    public function __construct()
    {
       

        $this->middleware('auth');
        $this->middleware(function($request, $next){
            if(Gate::allows('hrgabarang')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses!');
            });
    }
}
