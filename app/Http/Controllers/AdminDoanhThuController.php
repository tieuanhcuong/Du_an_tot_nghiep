<?php

namespace App\Http\Controllers;
use App\Models\Doanh_thu;
use App\Models\don_hang;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class AdminDoanhThuController extends AdminController
{
    public function __construct() {
        parent::__construct(); // Gọi constructor của lớp cha
    }

    public function index()
    {
        // Lấy tổng doanh thu theo tháng
        $doanhThu = don_hang::selectRaw('MONTH(thoi_diem_mua_hang) as thang, YEAR(thoi_diem_mua_hang) as nam, SUM(tong_tien) as tong_doanh_thu, COUNT(id) as so_luong_don_hang')
            ->whereIn('trang_thai', [4, 5]) // Lọc các đơn hàng có trạng thái 4 và 5
            ->groupByRaw('YEAR(thoi_diem_mua_hang), MONTH(thoi_diem_mua_hang)')
            ->orderByRaw('YEAR(thoi_diem_mua_hang) DESC')
            ->orderByRaw('MONTH(thoi_diem_mua_hang) DESC')
            ->get();

        $noData = $doanhThu->isEmpty();

        return view('admin.doanh_thu', compact('doanhThu', 'noData'));
    }

    public function detail($thang, $nam)
    {
        // Lấy chi tiết doanh thu cho tháng và năm đã chọn
        $chiTiet = don_hang::whereMonth('thoi_diem_mua_hang', $thang)
        ->whereYear('thoi_diem_mua_hang', $nam)
        ->whereIn('trang_thai', [4, 5])
        ->select('id','ten_nguoi_nhan','dien_thoai', 'tong_tien', 'thoi_diem_mua_hang')
        ->get();

    $tongSoLuong = $chiTiet->count();
    $tongDoanhThu = $chiTiet->sum('tong_tien');

    return view('admin.doanh_thu_detail', compact('chiTiet', 'tongSoLuong', 'tongDoanhThu', 'thang', 'nam'));
    }
    
}
