<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $userprofile = User::with('user', 'jabatan')->paginate();
        // return view('users.userprofile', compact('userprofile'));
        $user = User::where('id', Auth::user()->id)->first();

    	return view('users.userprofile', compact('user'));
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

        return view ('users.userprofile', compact('user', 'jab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->name = $request->name;
    	$user->email = $request->email;
        if($request->password!=null){
            $user->password=Hash::make($request->password);
        }
    	$user->alamat = $request->alamat;
    	$user->kontak=$request->kontak;
        $user->id_jabatan=$request->id_jabatan;
        
        if($request->hasFile('image'))
        {
            $request->file('image')->move('imageuser/', $request->file('image')->getClientOriginalName());
            $user->image = $request->file('image')->getClientOriginalName();
            $user->save();
        }
    	$user->save();
    	return redirect('/userprofile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
