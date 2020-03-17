<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history_stok_barang';
    protected $guarded = [];

    public function barang(){
        return $this->belongsTo('App\Model\Barang', 'id_barang');
    }

    public function penjualan(){
        return $this->belongsTo('App\Model\Penjualan', 'id_penjualan');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }
}
