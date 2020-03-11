<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function barang(){
        return $this->belongsToMany('App\Model\Barang', 'barang_penjualan', 'id_penjualan', 'id_barang');
    }

    public function history(){
        return $this->hasMany('App\Model\History');
    }
}
