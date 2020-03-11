<?php

namespace App\Http\Controllers;

use App\Model\JenisPaket;
use Illuminate\Http\Request;

class JenisPaketController extends Controller
{
    public function index(){
        $jenisPaket = JenisPaket::all();
        return view('jenisPaket.index', compact('jenisPaket'));
    }

    public function create(){
        $jenisPaket = new JenisPaket();
        return view('jenisPaket.create', compact('jenisPaket'));
    }

    public function store()
    {
        $data = request()->validate([
            'nama' => 'required',
            'jumlah_isi' => 'required|integer|unique:jenis_paket',
        ], [
            'nama.required' => 'Nama Barang Tidak Boleh Kosong',
            'jumlah_isi.required' => 'Jumlah Tidak Boleh Kosong',
            'jumlah_isi.integer' => 'Jumlah Harus Menggunakan Angka dan Bulat',
            'jumlah_isi.unique' => 'Jumlah sudah terdaftar'
        ]);
        JenisPaket::create($data);
        return redirect('jenisPaket')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit(JenisPaket $jenisPaket){
        return view('jenisPaket.edit', compact('jenisPaket'));
    }

    public function update(JenisPaket $jenisPaket)
    {
        $data = request()->validate([
            'nama' => 'required',
            'jumlah_isi' => 'required|integer|unique:jenis_paket',
        ], [
            'nama.required' => 'Nama Barang Tidak Boleh Kosong',
            'jumlah_isi.required' => 'Jumlah Tidak Boleh Kosong',
            'jumlah_isi.integer' => 'Jumlah Harus Menggunakan Angka dan Bulat',
            'jumlah_isi.unique' => 'Jumlah sudah terdaftar'
        ]);
        $jenisPaket->update($data);
        return redirect('jenisPaket')->with('success', 'Data Berhasil di Ubah');
    }

    public function destroy(JenisPaket $jenisPaket){
        $jenisPaket->delete();
        return redirect('jenisPaket')->with('success', 'Data Berhasil di Hapus');
    }
}
