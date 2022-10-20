<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Room;
use App\Models\User;
use App\Models\BorrowProduct;
use App\Models\BorrowRoom;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(7);
        $peminjaman = BorrowProduct::whereBetween('tanggal_pengembalian', [$startDate, $endDate])->where('status', '=' , 'disetujui')->where('petugas','=', Auth::user()->id)->get();

       $barang = Product::count();
       $ruangan = Room::count();
       $user = User::count();
       $pembarang = BorrowProduct::count();
       $pemruangan = BorrowRoom::count();

        return view('/home', compact('barang', 'ruangan','user','pembarang','pemruangan','peminjaman'));
    }
}
