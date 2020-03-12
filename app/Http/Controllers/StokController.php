<?php

namespace App\Http\Controllers;

use App\Model\Barang;
use App\Model\Stok;
use App\Model\History;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function create($id){
        $barang = Barang::find($id);
        return view('barang.stok', compact('barang'));
    }

    public function store($id){
        $data = request()->validate( [
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable',
        ], [
            'jumlah.required' => 'Isi Jumlah Stok',
            'jumlah.integer' => 'Jumlah Stok Harus Menggunakan Angka dan bulat',
            // 'keterangan.required' => 'Isi Keterangan',
        ]);

        $barang = Barang::find($id);
        if ($data['jumlah'] < 0 && $barang->jumlah+$data['jumlah'] < 0){
            return redirect()->back()->with('error', 'Pengurangan Stok Melebihi Batas, Stok Sisa '.+$barang['jumlah']);
        }

        $data['id_barang'] = $barang->id;
        if ($data['jumlah'] > 0) {
            $data['keterangan'] = 'tambah stok, '.$data['keterangan'];
        } else {
            $data['keterangan'] = 'kurang stok, '.$data['keterangan'];
        }
        Stok::create($data);

        $barang->jumlah = $barang->jumlah + $data['jumlah'];
        $barang->user_update = auth()->user()->id;
        $barang->update($barang->toArray());

        $history = [
            'id_user' => auth()->user()->id,
            'id_barang' => $barang->id,
            'jumlah' => $barang->jumlah,
            'status' => $data['keterangan'],
        ];
        History::create($history);

        if ($data['jumlah'] == 0){
            $success = "Stok Tidak Berubah";
        } elseif ($data['jumlah'] > 0){
            $success = "Stok Telah Ditambah";
        } else {
            $success = "Stok Telah Dikurangi";
        }
        return redirect('barang')->with('success', $success);
    }
}
