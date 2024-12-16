<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đơn Hàng Đã Bị Hủy</title>
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
      <h1>Xin chào {{ $donHang->ten_nguoi_nhan }}! Xin lỗi vì đã hủy đơn hàng của bạn.</h1>
    </div>
    <div class="content">
        <p><strong>Lý Do: Sản phẩm này của chúng tôi đang bị lỗi. Mong quý khách thông cảm! Cảm ơn quý khách rất nhiều</strong></p>
        <p>Thông tin đơn hàng của bạn:</p>
        <p>ID Đơn Hàng: {{ $donHang->id }}</p>
        <p>Tên Người Nhận: {{ $donHang->ten_nguoi_nhan }}</p>
        <p>Email: {{ $donHang->email }}</p>
        <p>Số Điện Thoại: {{ $donHang->dien_thoai }}</p>
        <p>Địa Chỉ Giao: {{ $donHang->dia_chi_giao }}</p>
        <p>Tổng Số Lượng: {{ $donHang->tong_so_luong }}</p>
        <p>Tổng Tiền: {{ number_format($donHang->tong_tien, 2) }} VNĐ</p>
        <p>Thời gian đặt hàng: {{date('d/m/Y',strtotime($donHang->thoi_diem_mua_hang))}}</p>
    
        <h2>Chi Tiết Sản Phẩm:</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $detail)
                    <tr>
                        <td>{{ $detail['ten_sp'] }}</td>
                        <td><img src="{{ asset($detail['hinh']) }}" alt="{{ $detail['ten_sp'] }}" width="100"></td>
                        <td>{{ $detail['so_luong'] }}</td>
                        <td>{{ number_format($detail['gia_km'], 2) }} VNĐ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
