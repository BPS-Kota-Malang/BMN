<?php

namespace App\Http\Controllers;

use App\Models\MerkProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;

class HRGAMerkBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk=MerkProduct::orderBy('id','desc')->paginate();
        return view('barangs.merk_hrga', compact('merk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $q = DB::table('merk_products')->select(DB::raw('MAX(RIGHT(kode_merk,4)) as kode'));
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
        
        
        
        return view('barangs.addmerk', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merk=new MerkProduct();
        $merk->kode_merk=$request->kode_merk;
        $merk->nama_merkbarang=$request->merk;
        $merk->save();
        return redirect('/merkbarang');
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
        $merk = MerkProduct::find($id);
        return view ('barangs.editmerk', compact('merk'));
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
        $merk = MerkProduct::find($id);
        $merk->kode_merk=$request->kode_merk;
        $merk->nama_merkbarang=$request->merk;
        $merk->save();
        return redirect('/merkbarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $merk = MerkProduct::find($id);
        $merk->delete();
        return redirect()->route('merkbarang.index');
    }

    public function cetak_merk()
    {
        $merk = MerkProduct::all();

        view()->share('merk', $merk);
        $pdf = PDF::loadview('barangs.merk-pdf');
        return $pdf->stream('daftar-merkbarang.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('merkbarang_hrga')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
