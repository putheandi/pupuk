<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisPaket extends Model
{
    protected $table = 'jenis_paket';
    protected $guarded = [];

//    public function barang(){
//        return $this->belongsTo('App\Model\Barang', 'id_barang');
//    }
}
