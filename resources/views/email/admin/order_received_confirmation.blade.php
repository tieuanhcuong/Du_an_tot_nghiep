{{-- <!DOCTYPE html>
<html>
<head>
    <title>Xác nhận giao hàng</title>
</head>
<body>
    <h1>Xin chào {{ $order->ten_nguoi_nhan }}</h1>
    <p>Cảm ơn bạn đã xác nhận rằng bạn đã nhận được đơn hàng.</p>
    <p>Thông tin đơn hàng:</p>
    <ul>
        <li>Mã đơn hàng: {{ $order->id }}</li>
        <li>Địa chỉ giao hàng: {{ $order->dia_chi_giao }}</li>
        <li>Điện thoại: {{ $order->dien_thoai }}</li>
    </ul>
    <p>Ban quản trị website MOBICENTER</p>
    <p>Chúng tôi hy vọng bạn hài lòng với sản phẩm của mình!</p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
</body>
</html>
 --}}

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xác nhận giao hàng</title>
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
      <h1>Xin chào {{ $order->ten_nguoi_nhan }}</h1>
    </div>
    <div class="content">
        <p>Cảm ơn bạn đã xác nhận rằng bạn đã nhận được đơn hàng.</p>
        <p>Thông tin đơn hàng:</p>
        <ul>
            <li>Mã đơn hàng: {{ $order->id }}</li>
            <li>Địa chỉ giao hàng: {{ $order->dia_chi_giao }}</li>
            <li>Điện thoại: {{ $order->dien_thoai }}</li>
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
