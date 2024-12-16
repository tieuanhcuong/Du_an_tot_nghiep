<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yêu cầu chuyển khoản lại</title>
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
      <h1>Chào {{ $order->ten_nguoi_nhan }}</h1>
      <h2>Thông báo yêu cầu chuyển khoản</h2>
    </div>
    <div class="content">
        <p>Chúng tôi xin thông báo rằng đơn hàng của bạn với mã số <strong>{{ $order->id }}</strong> cần thanh toán lại.</p>
        <p><strong>Số tiền cần thanh toán:</strong> {{ number_format($order->tong_tien, 0, ",", ".") }} VNĐ</p>
        <p>Xin vui lòng thực hiện chuyển khoản vào tài khoản dưới đây:</p>
        <ul>
            <li><strong>Tên ngân hàng:</strong> Ngân hàng ABC</li>
            <li><strong>Số tài khoản:</strong> 123456789</li>
            <li><strong>Chủ tài khoản:</strong> Ban quản trị website TheGioiDiDong</li>
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
