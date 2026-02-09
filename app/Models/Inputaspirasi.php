<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inputaspirasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'id_kategori',
        'lokasi',
        'keterangan',
        'feedback',
        'status',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

     public function aspirasi()
    {
        return $this->hasOne(Aspirasi::class,'inputaspirasi_id');
    }

    protected static function booted()
    {
        static::created(function($Inputaspirasi){
            $Inputaspirasi->aspirasi()->create([
                'status' => $Inputaspirasi->status ?? 'Menunggu',
                'id_kategori' => $Inputaspirasi->id_kategori,
                'feedback'  => $Inputaspirasi->feedback,
            ]);
        });
    }
}
