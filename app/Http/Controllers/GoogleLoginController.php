<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use App\Mail\Dangky;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Redirect;
use Carbon\Carbon;

class GoogleLoginController extends Controller {
    public function redirectToGoogle(): RedirectResponse  {
        return Socialite::driver('google')->redirect();
   
    }
    public function handleGoogleCallback(Request $request): RedirectResponse {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        
        // Lấy thông tin người dùng từ Google
        $user = Socialite::driver('google')->user();
    
        // Kiểm tra nếu email không phải là gmail.com
        if (substr($user->email, -10) !== '@gmail.com') {
            return redirect('/admin/dangnhap')->with('thongbao', 'Chỉ chấp nhận tài khoản có đuôi là @gmail.com để đăng nhập!');
        }
    
        // Kiểm tra nếu người dùng đã có trong hệ thống với google_id
        $existingUser = User::where('google_id', $user->id)->first();
        
        // Nếu người dùng đã tồn tại
        if ($existingUser) {
            // Nếu đã có người dùng, đăng nhập vào hệ thống
            auth()->login($existingUser, true);
            
            // Nếu đây là lần đăng nhập đầu tiên, gửi email
            if (is_null($existingUser->verification_sent_at)) {
                Mail::to($user->email)->send(new Dangky($user));
                $existingUser->verification_sent_at = $now; // Cập nhật thời gian gửi email
                $existingUser->save();
            }
        } else {
             // Xử lý kiểm tra email đã tồn tại hay chưa
             $email = strtolower(trim($user->email)); // Đảm bảo email không có ký tự thừa
            $existingEmailUser = User::where('email', $email)->first();
            
            if ($existingEmailUser) {
                // Nếu email đã tồn tại trong hệ thống, thông báo lỗi
                return redirect()->route('admin.login')->with('thongbao', 'Email này đã tồn tại.');
            }
            // Nếu người dùng chưa có, tạo người dùng mới
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->email_verified = 1;
            $newUser->verification_sent_at = $now;
            $newUser->password = bcrypt(Str::random()); // Set some random password
            $newUser->save();
    
            // Đăng nhập người dùng mới
            auth()->login($newUser, true);
    
            // Gửi email khi đăng nhập lần đầu
            Mail::to($user->email)->send(new Dangky($user));
        }
        
        // Redirect người dùng đến trang chủ hoặc trang mà bạn mong muốn
        return Redirect::to('http://127.0.0.1:8000/');
    }
    
    
    


    // public function handleGoogleCallback()
    // {
    //     $user = Socialite::drive('google')->user();
    //     $users = User::where("google_id",$user->id)->first();
    //     if(empty($users)){
    //         Auth::login($users);
    //         return redirect('home');
    //     }else{
    //         $users = User::create([
    //             "name" => $user->name,
    //             "email" => $user->email,
    //             "google_id" => $user->google_id,
    //         ]);
    //         Auth::login($users);
    //         return redirect('home');
    //     }
    // }
}