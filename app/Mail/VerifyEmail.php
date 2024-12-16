<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    // Khai báo thuộc tính user để lưu thông tin người dùng
    public $user;

    // Constructor nhận đối tượng User
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // Phương thức build để xây dựng email
    public function build()
    {
        return $this->view('email.verify')
                    ->with([
                        'url' => url("/verify-email/{$this->user->verification_token}")
                    ]);
    }
}
