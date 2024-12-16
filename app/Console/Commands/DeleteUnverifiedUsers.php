<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteUnverifiedUsers extends Command
{
    // Tên và mô tả lệnh
    protected $signature = 'users:delete-unverified';
    protected $description = 'Xóa người dùng chưa xác nhận email trong 10 phút';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Tìm những người dùng có email chưa xác nhận và mã xác nhận đã quá 10 phút
        $users = User::where('email_verified', 0)
                     ->where('verification_sent_at', '<', Carbon::now()->subMinutes(10))
                     ->get();

        foreach ($users as $user) {
            // Xóa người dùng chưa xác nhận
            $user->delete();
            $this->info('Đã xóa người dùng: ' . $user->email);
        }

        $this->info('Hoàn thành việc xóa người dùng chưa xác nhận.');
    }
}
