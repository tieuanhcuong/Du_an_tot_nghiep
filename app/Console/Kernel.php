<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\DeleteUnverifiedUsers;

class Kernel extends ConsoleKernel
{
    /**
     * Đăng ký các lệnh của ứng dụng.
     *
     * @var array
     */
    protected $commands = [
        DeleteUnverifiedUsers::class,
    ];

    /**
     * Định nghĩa các tác vụ lịch trình.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Thêm các lịch trình tại đây
        $schedule->command('users:delete-unverified')->everyFiveMinutes(); // Chạy command này mỗi 5 phút
    }

    /**
     * Đăng ký tất cả các lệnh cho ứng dụng.
     *
     * @return void
     */
    protected function commands()
    {
        // Tải các route lệnh từ thư mục Commands
        $this->load(__DIR__.'/Commands');

        // Yêu cầu tải các route lệnh mặc định
        require base_path('routes/console.php');
    }
}
