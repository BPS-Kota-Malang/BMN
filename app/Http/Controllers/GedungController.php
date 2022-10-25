<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use DB;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $building=Building::orderBy('id','desc')->paginate();
        return view ('ruangan.gedung', compact('building'));
    }

    public function gudang_hrga()
    {
        $building=Building::orderBy('id','desc')->paginate();
        return view ('ruangan.gedung_hrga', compact('building'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('buildings')->select(DB::raw('MAX(RIGHT(kode_gudang,4)) as kode'));
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
        
        return view ('ruangan.addgedung', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $building=new Building();
        $building->kode_gudang=$request->kode_gudang;
        $building->nama_gedung=$request->gedung;
        $building->alamat=$request->alamat;
        $building->save();
        return redirect('/gedung');
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
        $building = Building::find($id);
        return view ('ruangan.editgedung', compact('building'));
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
        $building = Building::find($id);
        $building->kode_gudang=$request->kode_gudang;
        $building->nama_gedung=$request->gedung;
        $building->alamat=$request->alamat;
        $building->save();
        return redirect('/gedung');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = Building::find($id);
        $building->delete();
        return redirect()->route('gedung.index');
    }

    public function cetak_gudang()
    {
        $building = Building::all();

        view()->share('gedung', $building);
        $pdf = PDF::loadview('ruangan.gudang-pdf');
        return $pdf->stream('data-gudang.pdf');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('gudang')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
