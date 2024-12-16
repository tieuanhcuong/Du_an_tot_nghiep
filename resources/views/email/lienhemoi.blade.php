<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chào mừng bạn!</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .email-container { width: 100%; max-width: 600px; margin: 0 auto; }
    .header { background-color: #4CAF50; color: white; padding: 20px; text-align: center; }
    .content { padding: 20px; background-color: #f4f4f4; }
    .footer { background-color: #333; color: white; text-align: center; padding: 10px; font-size: 12px; }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="header">
      <h1>Thông tin liên hệ mới</h1>
    </div>
    <div class="content">
        @php
            use Carbon\Carbon;
        @endphp
        <p><strong>Họ Tên:</strong> {{ $data['ho_ten'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Điện thoại:</strong> {{ $data['dien_thoai'] }}</p>
        <p><strong>Nội Dung:</strong> {{ $data['noi_dung'] }}</p>
        <p><strong>Thời Gian:</strong> {{ Carbon::parse($data['thoi_gian'])->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') }}</p>
    </div>
    <div class="footer">
        <p>Ban quản trị website MOBICENTER</p>
        <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
        <p></p>
        <p>Địa chỉ: Đường Tx33, Phường Thạnh Xuân, Thành phố Hồ Chí Minh</p>
        <p>Email: tieuanhcuong2004@gmail.com | Điện thoại: 0909 187 402</p>
    </div>
  </div>
</body>
</html>

