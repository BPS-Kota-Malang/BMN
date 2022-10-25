<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use DB;

class KelolaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::orderBy('id','desc')->paginate();
        return view ('users.kelolausers', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jab = Jabatan::all();
        return view ('users.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u=new User();
        $jab=Jabatan::all();
        $u->name=$request->name;
        $u->email=$request->email;
        $u->password=Hash::make($request->password);
        $u->kontak=$request->kontak;
        $u->alamat=$request->alamat;
        $u->role=$request->role;
        $u->id_jabatan=$request->id_jabatan;
     
        $u->save();
        return redirect('/kelolausers');
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
        $user = User::with('jabatan')->find($id);
        $jab = Jabatan::all();

        return view ('users.edit', compact('user', 'jab'));
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
        $user = User::with('jabatan')->find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        // dd($request->password);
        if($request->password!=null){
            $user->password=Hash::make($request->password);
        }
        $user->kontak=$request->kontak;
        $user->alamat=$request->alamat;
        $user->id_jabatan=$request->id_jabatan;
        $user->role=$request->role;
        $user->save();
        return redirect('/kelolausers');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::with('jabatan')->find($id);
        $user->delete();
        return redirect()->route('kelolausers.index');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('users')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
    }
}
