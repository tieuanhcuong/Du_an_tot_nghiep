{{-- <!DOCTYPE html>
<html>
<head>
    <title>Xác Nhận Đơn Hàng</title>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng!</h1>
    <p>Thông tin đơn hàng của bạn:</p>
    <p>ID Đơn Hàng: {{ $order->id }}</p>
    <p>Tên Người Nhận: {{ $order->ten_nguoi_nhan }}</p>
    <p>Email: {{ $order->email }}</p>
    <p>Số Điện Thoại: {{ $order->dien_thoai }}</p>
    <p>Địa Chỉ Giao: {{ $order->dia_chi_giao }}</p>
    <p>Tổng Số Lượng: {{ $order->tong_so_luong }}</p>
    <p>Tổng Tiền: {{ number_format($order->tong_tien, 2) }} VNĐ</p>
    <p>Thời gian đặt hàng: {{date('d/m/Y',strtotime($order->thoi_diem_mua_hang))}}</p>
    <p>Trạng thái: {{$order->loai_thanh_toan==0? "Thanh toán khi nhận hàng":"Chuyển khoản"}} </p>

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


    <p>Ban quản trị website MOBICENTER</p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xác Nhận Đơn Hàng</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .email-container { width: 100%; max-width: 600px; margin: 0 auto; }
    .header { background-color: #4CAF50; color: white; padding: 20px; text-align: center; }
    .content { padding: 20px; background-color: #f4f4f4; }
    .footer { background-color: #333; color: white; text-align: center; padding: 10px; font-size: 12px; }

    /* CSS cho bảng */
    table {
      width: 100%;
      border-collapse: collapse; /* Loại bỏ khoảng cách giữa các ô */
      margin-bottom: 20px; /* Khoảng cách dưới bảng */
    }

    th, td {
      padding: 8px;
      text-align: left;
      border: 1px solid #ddd; /* Thêm đường viền mỏng */
    }

    th {
      background-color: #f2f2f2; /* Màu nền cho các ô tiêu đề */
    }

    td img {
      width: 100px; /* Chiều rộng hình ảnh cố định */
      height: auto;
    }

    /* Cải thiện khoảng cách giữa các ô */
    td, th {
      padding: 8px 10px; /* Thêm khoảng cách giữa các ô */
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="header">
      <h1>Cảm ơn bạn đã đặt hàng!</h1>
    </div>
    <div class="content">
      <p>Thông tin đơn hàng của bạn:</p>
      <p>ID Đơn Hàng: {{ $order->id }}</p>
      <p>Tên Người Nhận: {{ $order->ten_nguoi_nhan }}</p>
      <p>Email: {{ $order->email }}</p>
      <p>Số Điện Thoại: {{ $order->dien_thoai }}</p>
      <p>Địa Chỉ Giao: {{ $order->dia_chi_giao }}</p>
      <p>Tổng Số Lượng: {{ $order->tong_so_luong }}</p>
      <p>Tổng Tiền: {{ number_format($order->tong_tien, 2) }} VNĐ</p>
      <p>Thời gian đặt hàng: {{date('d/m/Y',strtotime($order->thoi_diem_mua_hang))}}</p>
      <p>Trạng thái: {{$order->loai_thanh_toan==0? "Thanh toán khi nhận hàng":"Chuyển khoản"}} </p>

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
              <td><img src="{{ asset($detail['hinh']) }}" alt="{{ $detail['ten_sp'] }}"></td>
              <td>{{ $detail['so_luong'] }}</td>
              <td>{{ number_format($detail['gia_km'], 2) }} VNĐ</td>
            </tr>
          @endforeach
        </tbody>
      </table>
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


