<?php

namespace App\Http\Controllers;

use App\Models\StatusProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;

class StatusBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status=StatusProduct::all();
        return view('barangs.statusbarang', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('status_products')->select(DB::raw('MAX(RIGHT(kode_status,4)) as kode'));
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
       
        return view('barangs.addstatus', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status=new StatusProduct();
        $status->kode_status=$request->kode_status;
        $status->nama_statusbarang=$request->statusbarang;
        $status->save();
        return redirect('/statusbarang');
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
        $status = StatusProduct::find($id);
        return view ('barangs.editstatusbarang', compact('status'));
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
        $status = StatusProduct::find($id);
        $status->kode_status=$request->kode_status;
        $status->nama_statusbarang=$request->statusbarang;
        $status->save();
        return redirect('/statusbarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = StatusProduct::find($id);
        $status->delete();
        return redirect()->route('statusbarang.index');
    }

    public function cetak_statusbarang()
    {
        $status = StatusProduct::all();

        view()->share('status', $status);
        $pdf = PDF::loadview('barangs.statusbarang-pdf');
        return $pdf->stream('daftar-statusbarang.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('statusbarang')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
