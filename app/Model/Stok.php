<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok';
    protected $guarded = [];

    public function barang(){
        return $this->belongsTo('App\Model\Barang', 'id_barang');
    }
}
