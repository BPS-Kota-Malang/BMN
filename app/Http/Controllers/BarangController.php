<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\BorrowProduct;
use App\Models\ProductCategory;
use App\Models\MerkProduct;
use App\Models\StatusProduct;
use App\Models\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

        $jringan = Product::where('id_kondisi', '=', 1)->count();
        $jsedang = Product::where('id_kondisi', '=', 2)->count();
        $jberat = Product::where('id_kondisi', '=', 3)->count();

        $barang = Product::orderBy('id','desc')->get();
        // $kondisi= DB::table('products')
        //                 ->groupBy('id_statusproduct')
        //                 ->get();
        return view('barangs.index', compact('barang','jtersedia','jdipinjam','jrusak','jhilang','jdiservis','jringan','jsedang','jberat'));
    }

    // public function Getkondisi($id)
    // {
    //     $html='';
    //     $kondisi=Kondisi::where('id_statusproduct',$id)->get();
    //     // return response()->json($kondisi);

    //     foreach($kondisi as $k) {
    //         $html.= '<option value="'.$k->id.'">'.$k->jenis_kondisi.'</option>';
    //     }

    //     return response()->json($html);
    // }

    // public function GetSubCatAgainstMainCatEdit($id){
    //     echo json_encode(DB::table('products')->where('id_kondisi', $id)->get());
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodcat = ProductCategory::all();
        $merk = MerkProduct::all();
        $status = StatusProduct::all();
        // $kondisi = Kondisi::all();
        $kondisi=Kondisi::all();
        // return response()->json($kondisi);



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
        return view ('barangs.addbarang', compact('prodcat', 'merk', 'status', 'kd','kondisi'));
        return response()->json($kondisi);
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
            'serial_number'=>$request->serial_number,
            'nama_barang' => $request->nama_barang,
            'id_merkproduct' => $request->id_merkbarang,
            'id_productcategory' => $request->id_kategoribarang,
            'kondisi'=>$request->kondisi,
            // 'harga_beli' => $request->hargabeli,
            'jumlah' => $request->jumlah,
            // 'satuan' => $request->satuan,
            'keterangan'=>$request->keterangan,
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
        $prod = Product::with('productcategory', 'merek', 'status', 'kondisi' )->find($id);
        $prodcat = ProductCategory::all();
        $merk = MerkProduct::all();
        $kondisi = Kondisi::all();

        $status = StatusProduct::all();



        return view ('barangs.editbarang', compact('prod', 'prodcat', 'merk', 'status','kondisi'));
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
        $prod = Product::with('productcategory', 'merek', 'status','kondisi')->find($id);
        $prod->kode_barang=$request->kode_barang;
        $prod->serial_number=$request->serial_number;
        $prod->nama_barang=$request->nama_barang;
        $prod->id_merkproduct=$request->id_merkbarang;
        $prod->id_productcategory=$request->id_kategoribarang;
        $prod->id_kondisi=$request->kondisi;
        // $prod->harga_beli=$request->hargabeli;
        $prod->jumlah=$request->jumlah;
        // $prod->satuan=$request->satuan;
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
        $prod = Product::with('productcategory', 'merek', 'status','kondisi')->find($id);
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

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware(function($request, $next){
    //     if(Gate::allows('barang')) return $next($request);
    //     abort(403, 'Anda tidak memiliki cukup hak akses!');
    //     });


    // }
}
