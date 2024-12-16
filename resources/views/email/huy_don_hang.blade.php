<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông Báo Hủy Đơn Hàng</title>
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
      <h1>Chào {{ $donHang->ten_nguoi_nhan }}</h1>
    </div>
    <div class="content">
        <p>Chúng tôi xin thông báo rằng đơn hàng của bạn với mã đơn hàng <strong>#{{ $donHang->id }}</strong> đã được hủy thành công theo yêu cầu của bạn.</p>
        <p>Thông tin đơn hàng:</p>
        <ul>
            <li>Mã đơn hàng: {{ $donHang->id }}</li>
            <li>Ngày đặt: {{date('d/m/Y',strtotime($donHang->thoi_diem_mua_hang))}}</li>
            <li>Trạng thái: Đã hủy</li>
        </ul>
        <p>Chúng tôi rất tiếc vì sự bất tiện này và hy vọng được phục vụ bạn trong tương lai.</p>
        <p>Trân trọng,</p>
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
