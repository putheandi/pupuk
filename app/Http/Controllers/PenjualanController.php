<?php

namespace App\Http\Controllers;

use App\Model\Barang;
use App\Model\History;
use App\Model\Penjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('penjualan.create', compact('barang'));
    }

    public function store()
    {
        $data = request()->validate([
            'barang' => 'array',
            'qty_barang' => 'array',
            'barang.*' => '',
            'qty_barang.*' => 'integer|min:0',
        ]);
        $harga_total = 0;
        foreach ($data['barang'] AS $key => $value) {
            $barang = Barang::find($value);
            $$value = isset($$value) ? $$value + $data['qty_barang'][$key] : 0 + $data['qty_barang'][$key];
            if ($$value > $barang->jumlah) {
                return redirect()->back()->with('error', 'Transaksi Gagal, Stok Sisa <b>' . $barang->nama_barang . '</b> Tidak Cukup, Sisa Stok ' . $barang->jumlah);
            }
            $harga_total += $barang->harga * $data['qty_barang'][$key];
        }

        $penjualan = [
            'id_user' => auth()->user()->id,
            'kode_transaksi' => 'TRS-'.strtotime(date('Y-m-d H:i:s')),
            'jumlah_total' => array_reduce($data['qty_barang'],function($total,$value){
                return $total+$value;
            }),
            'harga_total' => $harga_total
        ];
        DB::beginTransaction();
        try {
            $penjualan = Penjualan::create($penjualan);
            foreach ($data['barang'] AS $key => $value) {
                $barang = Barang::find($value);
                $penjualan->barang()->save($barang, [
                    'jumlah' => $data['qty_barang'][$key],
                    'harga' => $barang->harga,
                    'harga_total' => $data['qty_barang'][$key] * $barang->harga
                ]);
                $barang->jumlah = $barang->jumlah - $data['qty_barang'][$key];
                $barang->user_update = auth()->user()->id;
                $barang->save();
                $history = [
                    'id_user' => auth()->user()->id,
                    'id_barang' => $barang->id,
                    'id_penjualan' => $penjualan->id,
                    'jumlah' => $data['qty_barang'][$key],
                    'status' => 'transaksi',
                ];
                History::create($history);
            }
        } catch (\Exception $exception){
            DB::rollBack();
        }
        DB::commit();
        return redirect('penjualan')->with('success', 'Transaksi Telah Dilakukan');
    }

}
