<?php


namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;


class HRGAKategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=ProductCategory::orderBy('id','desc')->paginate();
        return view('barangs.kategoribarang_hrga', compact('kategori'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('product_categories')->select(DB::raw('MAX(RIGHT(kode_kategori,4)) as kode'));
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
        
        
        return view('barangs.addkatbarang', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p=new ProductCategory();
        $p->kode_kategori=$request->kode_kategori;
        $p->nama_kategbarang=$request->kategoribarang;
        $p->save();
        return redirect('/kategoribarang');
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
        $katbar = ProductCategory::find($id);
        return view ('barangs.editkatbarang', compact('katbar'));
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
        $katbar = ProductCategory::find($id);
        $katbar->kode_kategori=$request->kode_kategori;
        $katbar->nama_kategbarang=$request->kategoribarang;
        $katbar->save();
        return redirect('/kategoribarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $katbar = ProductCategory::find($id);
        $katbar->delete();
        return redirect()->route('kategoribarang.index');
    }

    public function cetak_kategbarang()
    {
        $katbar = ProductCategory::all();

        view()->share('kategoribarang', $katbar);
        $pdf = PDF::loadview('barangs.kategoribarang-pdf');
        return $pdf->stream('data-kategoribarang.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('kategbarang_hrga')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
