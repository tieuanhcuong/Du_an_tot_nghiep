<?php

namespace App\Mail;

use App\Models\DonHang;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\don_hang;

class HuyDonHang extends Mailable
{
    use Queueable, SerializesModels;

    public $donHang;

    public function __construct(don_hang $donHang)
    {
        $this->donHang = $donHang;
    }

    public function build()
    {
        return $this->subject('Thông Báo Hủy Đơn Hàng')  // Tiêu đề email
                    ->view('email.huy_don_hang');  // View email bạn tạo
    }
}

