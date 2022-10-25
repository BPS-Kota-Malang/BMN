<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Gate;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::orderBy('id','desc')->paginate();
        return view ('users.index', compact('user'));
    }
    

    public function register(Request $request)
    {
     
        $u=new User();
        $jab=Jabatan::all();
        $u->name=$request->name;
        $u->email=$request->email;
        $u->password=Hash::make($request->password);
        $u->kontak=$request->kontak;
        $u->alamat=$request->alamat;
        $u->role='requestor';
        $u->id_jabatan=$request->id_jabatan;
        $u->save();
        
        // return $request;
        return redirect('/login');
        

       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cetak_daftaruser()
    {
        $user = User::all();

        view()->share('user', $user);
        $pdf = PDF::loadview('users.daftaruser-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('daftar-users.pdf');
    }

    // public function __construct()
    // {
    //     //$this->middleware('auth');
    //     $this->middleware(function($request, $next){
    //     if(Gate::allows('users')) return $next($request);
    //     abort(403, 'Anda tidak memiliki cukup hak akses!');
    //     });
    // }
}
