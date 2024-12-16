<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông Báo Mua Lại Đơn Hàng</title>
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
      <h1>Chào {{ $newOrder->ten_nguoi_nhan }}</h1>
    </div>
    <div class="content">
        <p>Chúng tôi xin thông báo rằng đơn hàng của bạn với mã đơn hàng <strong>#{{ $donHang->id }}</strong> đã được mua lại thành công theo yêu cầu của bạn.</p>
        
        <p><strong>Thông tin đơn hàng cũ:</strong></p>
        <ul>
            <li>Mã đơn hàng: {{ $donHang->id }}</li>
            <li>Ngày đặt: {{ date('d/m/Y', strtotime($donHang->thoi_diem_mua_hang)) }}</li>
            <li>Trạng thái: Đã giao thành công</li>
        </ul>

        <p><strong>Thông tin đơn hàng mới:</strong></p>
        <ul>
            <li>Mã đơn hàng: {{ $newOrder->id }}</li>
            <li>Tên Người Nhận: {{ $newOrder->ten_nguoi_nhan }}</li>
            <li>Email: {{ $newOrder->email }}</li>
            <li>Số Điện Thoại: {{ $newOrder->dien_thoai }}</li>
            <li>Địa Chỉ Giao: {{ $newOrder->dia_chi_giao }}</li>
            <li>Tổng Số Lượng: {{ $newOrder->tong_so_luong }}</li>
            <li>Tổng Tiền: {{ number_format($newOrder->tong_tien, 2) }} VNĐ</li>
            <li>Loại thanh toán: {{$newOrder->loai_thanh_toan==0? "Thanh toán khi nhận hàng":"Chuyển khoản"}}</li>
            <li>Ngày đặt: {{ date('d/m/Y', strtotime($newOrder->thoi_diem_mua_hang)) }}</li>
            <li>Trạng thái: Đang chờ xác nhận</li>
        </ul>

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
                        <td>{{ $detail->ten_sp }}</td>
                        <td><img src="{{ asset($detail->hinh) }}" alt="{{ $detail->ten_sp }}" width="50"></td>
                        <td>{{ $detail->so_luong }}</td>
                        <td>{{ number_format($detail->gia_km, 2) }} VNĐ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>Chúng tôi sẽ xem và xác nhận đơn hàng mới của bạn sớm nhất có thể.</p>
        <p>Cảm ơn quý khách.</p>
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
