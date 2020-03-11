<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    //tidak perlu relasi dengan penjualan, table pivot cukup tulis 1 relasi saja di model penjualan
//    public function penjualan(){
//        return $this->hasMany('App\Model\Penjualan', 'id_penjualan');
//    }

    public function history(){
        return $this->hasMany('App\Model\History');
    }

    public function stok(){
        return $this->hasMany('App\Model\Stok');
    }
}
