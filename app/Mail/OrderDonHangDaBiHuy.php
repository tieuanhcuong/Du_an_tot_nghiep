<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\don_hang;
use App\Models\don_hang_chi_tiet;

class OrderDonHangDaBiHuy extends Mailable
{
    use Queueable, SerializesModels;

    public $donHang;
    public $orderDetails;
    
    public function __construct(don_hang $donHang, $orderDetails)
    {
        $this->donHang = $donHang;
        $this->orderDetails = $orderDetails;
    }

    public function build()
    {
        return $this->subject('Đơn Hàng Bị Hủy')
                    ->view('email.admin.order_donhangdabihuy') // Chỉ định view cho email
                    ->with([
                        'donHang' => $this->donHang,
                    ]);
    }
}
