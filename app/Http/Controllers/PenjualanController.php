<?php

namespace App\Http\Controllers;

use App\Model\Barang;
use App\Model\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(){
        $penjualan = Penjualan::all();
        return view('penjualan.index', compact('penjualan'));
    }

    public function create(){
        $barang = Barang::all();
        return view('penjualan.create', compact('barang'));
    }

    public function store(){
        $data = request()->validate( [
            'id_barang' => 'required',
            'jumlah' => 'required|integer|min:0',
            'harga' => 'required|integer',
        ]);

        $barang = Barang::find($data['id_barang']);

        if ($data['jumlah'] > $barang->jumlah){
            return redirect()->back()->with('error', 'Transaksi Gagal, Stok Sisa '. +$barang['jumlah']);
        }

        $data['id_user'] = auth()->user()->id;
        $penjualan = Penjualan::create($data);

        $barang->jumlah = $barang->jumlah - $data['jumlah'];
        $barang->user_update = auth()->user()->id;
        $barang->update($barang->toArray());

        $history = [
            'id_user'      => auth()->user()->id,
            'id_barang'    => $barang->id,
            'id_penjualan' => $penjualan->id,
            'jumlah'       => $data['jumlah'],
            'status'       => 'transaksi',
        ];
        History::create($history);

        return redirect('penjualan')->with('success', 'Transaksi Telah Dilakukan');
    }

}
