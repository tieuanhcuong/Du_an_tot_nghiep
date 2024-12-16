<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class don_hang_chi_tiet extends Model
{
    use HasFactory;
    protected $table = 'don_hang_chi_tiet';
    public $primaryKey ='id';

    protected $fillable = [
        'id_dh',
        'id_sp',
        'ten_sp',
        'hinh',
        'so_luong',
        'gia_km',
    ];
    public function danhgia()
{
    return $this->hasOne(Danh_Gia::class, 'id_sp', 'id_sp');
}
public function don_hang()
{
    return $this->belongsTo(don_hang::class, 'id_dh');
}
}
