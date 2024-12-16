<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\san_pham;

class thuoc_tinh extends Model
{
    use HasFactory;
    protected $table = 'thuoc_tinh';
    public $primaryKey ='id';
    protected $fillable = ['id_sp','he_dieu_hanh','cpu','ram','bo_nho','mau_sac','can_nang','do_phan_giai_man_hinh','tan_so_quet','camera_chinh','camera_phu','pin','cong_ket_noi','ket_noi_mang'];

    public function san_pham()
    {
        return $this->belongsTo(san_pham::class, 'id_sp', 'id'); // 'id_sp' là khóa ngoại trong bảng thuoc_tinh
    }
}

