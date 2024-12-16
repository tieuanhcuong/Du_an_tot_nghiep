<?php

namespace App\Mail;

use App\Models\DonHang;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\don_hang;

class PhucHoiDonHang extends Mailable
{
    use Queueable, SerializesModels;

    public $donHang;

    public function __construct(don_hang $donHang)
    {
        $this->donHang = $donHang;
    }

    public function build()
    {
        return $this->subject('Thông Báo Phục Hồi Đơn Hàng Đã Hủy Thành Công')  // Tiêu đề email
                    ->view('email.phuc_hoi_don_hang');  // View email bạn tạo
    }
}

