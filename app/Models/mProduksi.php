<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mProduksi extends Model
{
    protected $table = 'tb_produksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'urutan',
        'id_lokasi',
        'kode_produksi',
        'tgl_mulai_produksi',
        'tgl_selesai_produksi',
        'catatan',
        'status_finish_date',
        'publish',
        'publish_date',
        'finish',
    ];

    function lokasi()
    {
        return $this->belongsTo(related: mLokasi::class, foreignKey: 'id_lokasi');
    }
}
