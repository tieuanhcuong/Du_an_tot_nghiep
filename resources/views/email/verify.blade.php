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
    .footer { background-color: #333; color: white; text-align: center; padding: 10px; font-size: 12px; margin-top: 20px; }

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
      <h1>Chào {{ $user->name }}<h1>
    </div>
    <div class="content">
        <p>Vui lòng nhấp vào liên kết dưới đây để xác nhận email của bạn:</p>

        <div>
        <a style="padding: 12px; background-color: #304ddc; color: white; text-decoration: none; border-radius: 5px; font-size: 16px" href="{{ $url }}">Xác nhận email</a>
        </div>

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
