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
      <h1>Xin chào {{ $tenKhachHang }}</h1>
    </div>
    <div class="content">
        <p>Chúng tôi có câu hỏi về yêu cầu trả hàng của bạn:</p>
        <p>{{ $cauHoi }}</p>
        <p>ID đơn hàng: {{ $idDonHang }}</p>
        <p>Lý do trả hàng:</p>
        <ul>
            @if (!empty($reasons))
                @foreach ($reasons as $reason)
                    <li>{{ $reason }}</li>
                @endforeach
            @else
                <li>Không có lý do cụ thể</li>
            @endif
        </ul>
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
