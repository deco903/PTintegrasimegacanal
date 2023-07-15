<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
 

class BasicController extends Controller
{
    public function index()
    {
        $response = Http::get('https://dummyjson.com/products');
        $data = $response->json();
        //dd($data);
        return view ('index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        // insert data ke table pegawai
		DB::table('t_pesanan')->insert([
			'no_pesanan' => $request->no_pesanan,
			'tanggal' => $request->tanggal,
			'nm_supplier' => $request->nm_supplier,
			'nm_produk' => $request->nm_produk,
            'total' => $request->total
		]);
		// alihkan halaman ke halaman pegawai
		return redirect()->back();
    }
}
