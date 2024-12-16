<?php

namespace App\Mail;

use App\Models\DonHang;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\don_hang;

class MuaLaiDonHangMoi extends Mailable
{
    use Queueable, SerializesModels;

    public $donHang;
    public $newOrder;
    public $orderDetails;

    public function __construct(don_hang $donHang, don_hang $newOrder)
    {
        $this->donHang = $donHang;
        $this->newOrder = $newOrder;
        $this->orderDetails = $newOrder->don_hang_chi_tiets;
    }

    public function build()
    {
        return $this->subject('Thông Báo Mua Lại Đơn Hàng Thành Công')  
                    ->view('email.mua_lai_don_hang_moi');  
    }
}

