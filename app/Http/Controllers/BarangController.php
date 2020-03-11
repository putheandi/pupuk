<?php

namespace App\Http\Controllers;

use App\Model\Barang;
use App\Model\JenisPaket;
use App\Model\Stok;
use App\Model\History;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create(){
        $items = JenisPaket::all();
        return view('barang.create', compact( 'items'));
    }

    public function store(){
        $data = request()->validate( [
            'nama_barang' => 'required',
            'merk'        => 'required',
            'jumlah'      => 'required|integer|min:0',
            'harga'       => 'required|integer|min:0',
        ], [
            'nama_barang.required' => 'Nama Barang Tidak Boleh Kosong',
            'merk.required'        => 'Merk Tidak Boleh Kosong',
            'jumlah.required'      => 'Jumlah Tidak Boleh Kosong',
            'jumlah.integer'       => 'Jumlah Harus Menggunakan Angka dan Bulat',
            'jumlah.min'           => 'Jumlah Tidak Boleh di Bawah 0 !',
            'harga.required'       => 'Harga Tidak Boleh Kosong',
            'harga.integer'        => 'Harga Harus Menggunakan Angka dan Bulat',
            'harga.min'            => 'Harga Tidak Boleh di Bawah 0 !',
        ]);

        $data['jumlah'] = $data['jumlah'] * request()->jenis_paket;
        $data['id_user'] = auth()->user()->id;       
        $data['user_create'] = auth()->user()->id;       
        $barang = Barang::create($data);

        $history = [
            'id_user' => auth()->user()->id,
            'id_barang' => $barang->id,
            'jumlah' => $barang->jumlah,
            'status' => 'penambahan barang baru'    
        ];
        History::create($history);

        return redirect('barang')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit(Barang $barang){
        return view('barang.edit', compact('barang'));
    }

    public function update(Barang $barang){
        $data = request()->validate( [
            'nama_barang' => 'required',
            'merk' => 'required',
            'harga' => 'required|integer',
        ], [
            'nama_barang.required' => 'Nama Barang Tidak Boleh Kosong',
            'merk.required' => 'Merk Tidak Boleh Kosong',
            'harga.required' => 'Harga Tidak Boleh Kosong',
            'harga.integer' => 'Harga Harus Menggunakan Angka dan bulat',
        ]);

        $barang->update($data);
        return redirect('barang')->with('success', 'Data Berhasil di Ubah');
    }

    public function destroy(Barang $barang){
        $barang->delete();
        return redirect('barang')->with('success', 'Data Telah di Hapus');
    }

}