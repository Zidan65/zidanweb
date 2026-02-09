<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $fillable  = [
        'inputaspirasi_id',
        'status',
        'feedback',
        'id_kategori',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

    public function inputaspirasi()
    {
        return $this->belongsTo(Inputaspirasi::class,'inputaspirasi_id');
    }

    protected static function booted()
    {
        static::updated(function($aspirasi){
            $parent = $aspirasi->inputaspirasi;

            if($parent){
                $parent->update([
                    'status' => $aspirasi->status,
                    'feedback' => $aspirasi->feedback,
                ]);
            }
                
            
        });

}
}


