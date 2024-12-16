@extends('layout')
@section('title') Thông tin khách hàng @endsection
@section('noidungchinh')
<style>
    .input-error { 
        border: 2px solid rgb(132, 134, 246);
    }

</style>
<div class="container">
    <div>
        <a style="color: rgb(100, 100, 100); margin: 20px;" href="javascript:void(0);" onclick="history.back();"><- Quay lại giỏ hàng</a>
    </div>
    {{-- @if (session()->has('cart') && count(session('cart')) > 0) --}}
   
    {{-- @else
      <script>
        // Nếu giỏ hàng trống, chuyển hướng người dùng về trang giỏ hàng
        window.location.href = "{{  view('user.donhang.hiengiohang') }}";
      </script>
    @endif --}}


    <table class="table table-bordered align-middle border-primary m-2" id="tblgiohang">
      
      @if (auth()->check())
    
      <div class="py-5 text-center">
        <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
        <h2>Thanh toán</h2>
        <p class="lead">Vui lòng kiểm tra thông tin Khách hàng và sản phẩm trước khi thanh toán.</p>
      </div>
      

      <form method="POST" action="{{route('thanhtoan')}}" class="m-auto col-10 border border-2 border-primary rounded mt-3 shadow-lg"> 
        @csrf
        {{-- <table class="table table-giohang table-bordered align-middle border-primary m-2 mb-5" id="tblgiohang"> --}}
          {{-- <form action="" > @csrf --}}
            {{-- <input type="hidden" name="cart" value="{{ json_encode($cart) }}"> --}}
            <caption class="fw-bolder text-center fs-4 mb-3" align="top">
              SẢN PHẨM BẠN ĐÃ CHỌN 
            </caption>
            <tr>
                  <thead class="thanhth text-center">
                    <th>Tên sản phẩm</th> 
                    <th class="giohangimg">Ảnh</th> 
                    <th>Số lượng </th>
                    <th class="giohangdongia">Đơn giá</th> 
                    <th class="giohangthanhtien">Thành tiền</th> 
                  </thead>
            </tr>   
            @if (session()->has('cart') && count(session('cart')) > 0)
                @foreach ($cart as $c)
        
                    <tr class="thanhtd" id="product-row-{{$c['id_sp']}}">
                        <td class="text-center"><b>{{$c['ten_sp']}}</b></td>
                        <td class="text-center cartimg"><img src="{{$c['hinh']}}" alt="" width="200px"></td>
                        <td class="text-center">
                          <span>
                            {{$c['soluong']}}
                        </span>
                        </td>
                        <td class="text-center">{{number_format($c['gia'], 0, ',', '.') }} VNĐ</td>
                        <td class="text-center">{{number_format($c['thanhtien'], 0, ',', '.') }} VNĐ</td>
                       
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Giỏ hàng của bạn hiện đang trống</td>
                </tr>
            @endif
        
        
           
            <tfoot>
              @if ($cart && count($cart) > 0)
                  <tr>
                      <th colspan="6" class="soluongtien text-center">
                          Số lượng sản phẩm: {{$tongsoluong}} . Tổng tiền: {{number_format($tongtien, 0, ',', '.') }} VNĐ
                      </th>
                     
                  </tr>
              @endif
            </tfoot>
        </table>
    
         {{-- @method('PUT') --}}
        <h3 class="text-center mt-2">Thông tin khách hàng</h3>
        <div class="m-3 mt-0 row">
          <div class="col-6">Họ và tên : 
            <input name="name" value="{{old ('name', Auth::user() ? Auth::user()->name : '')}}" type="text"
            class="form-control border-primary shadow-none p-2" >
            <b class="text-danger"> @error('name') {{ $message }} @enderror </b>
          </div>
          <div class="col-6"> Email :
            <input name="email" value="{{old ('email', Auth::user() ?Auth::user()->email : '')}}" type="text" 
            class="form-control border-primary shadow-none p-2" placeholder="Dùng email @gmail.com" >
            <b class="text-danger"> @error('email') {{ $message }} @enderror </b>
          </div>
        </div>
        <div class="m-3 row">
          <div class="col-6"> Điện thoại :
            <input name="dien_thoai" value="{{ old('dien_thoai', Auth::user() ? Auth::user()->dien_thoai : '') }}" type="text" 
            class="form-control border-primary shadow-none p-2" >
            <b class="text-danger"> @error('dien_thoai') {{ $message }} @enderror </b>
          </div>
          <div class="col-6"> Địa chỉ :
            <input name="dia_chi"  value="{{ old('dia_chi', Auth::user() ? Auth::user()->dia_chi : '') }}" type="text" 
            class="form-control border-primary shadow-none p-2" placeholder="Số nhà - Đường - Phường - Quận" >
            <b class="text-danger"> @error('dia_chi') {{ $message }} @enderror </b>
        </div>
        </div>      
        <div class=" m-3 text-center"> 
          <span class="mr-3 fs-5">Hình thức thanh toán : </span><br>
          <select name="loai_thanh_toan" id="payment-method">
            <option value="0">Thanh toán bằng tiền mặt</option>
            {{-- <option value="1">Chuyển khoản</option> --}}
          </select>
        </div>
        {{-- <div id="bank-transfer-info" style="display: none;">
          <div class="col-6 m-3">
                  <div class="card-body">
                      <h4>Thông tin chuyển khoản:</h4>
                      <p>Tên ngân hàng: Ngân hàng XYZ</p>
                      <p>Tên chủ tài khoản: Tiêu Anh Cường</p>
                      <p>Số tài khoản: 0909187402</p>
                  </div>
          </div>
          <div class="col-6 m-3">
                  <div class="card-body">
                      <img src="/images/maQRzalo.jpg" alt="QR Code" style="width: 100px" class="img-fluid card-img-top" />
                      <span>Vui lòng quét mã QR hoặc chuyển khoản đến số tài khoản bên trái.</span>
                  </div>
          </div>
        </div> --}}
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-success fs-5">Đặt hàng</button>
        </div>
      </form>
      <script>
        document.getElementById('payment-method').addEventListener('change', function() {
            const bankTransferInfo = document.getElementById('bank-transfer-info');
            bankTransferInfo.style.display = this.value == '1' ? 'block' : 'none';
        });
    
        document.getElementById('payment-method').addEventListener('change', function() {
            const bankTransferInfo = document.getElementById('bank-transfer-info');
            if (this.value == '1') { // Nếu chọn "Chuyển khoản"
                bankTransferInfo.style.display = 'flex'; // Hiện với d-flex
            } else {
                bankTransferInfo.style.display = 'none'; // Ẩn khi không chọn
            }
        });

      </script>
    
      @else 
      <div class="py-5 text-center">
        <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
        <h2>Thanh toán</h2>
        <p class="lead">Vui lòng kiểm tra thông tin Khách hàng và sản phẩm trước khi thanh toán.</p>
      </div>

        <div id="error-message" class="m-auto col-8 fs-5 alert alert-danger text-center" style="display: none;"></div>

      
      <form id="order-form" method="POST" action="{{route('thanhtoan')}}" class="m-auto col-10 border border-2 border-primary rounded mt-3 shadow-lg"> 
        @csrf
        <table class="table table-giohang table-bordered align-middle border-primary m-2 mb-5" id="tblgiohang">
          {{-- <form action="" method="POST"> @csrf --}}
            {{-- <input type="hidden" name="cart" value="{{ json_encode($cart) }}"> --}}
            <caption class="fw-bolder text-center fs-4 mb-3" align="top">
              SẢN PHẨM BẠN ĐÃ CHỌN 
            </caption>
            <tr>
                  <thead class="thanhth text-center">
                    <th>Tên sản phẩm</th> 
                    <th class="giohangimg">Ảnh</th> 
                    <th>Số lượng </th>
                    <th class="giohangdongia">Đơn giá</th> 
                    <th class="giohangthanhtien">Thành tiền</th> 
                  </thead>
            </tr>   
            @if (session()->has('cart') && count(session('cart')) > 0)
                @foreach ($cart as $c)
        
                    <tr class="thanhtd" id="product-row-{{$c['id_sp']}}">
                        <td class="text-center"><b>{{$c['ten_sp']}}</b></td>
                        <td class="text-center cartimg"><img src="{{$c['hinh']}}" alt="" width="200px"></td>
                        <td class="text-center">
                          <span>
                            {{$c['soluong']}}
                        </span>
                        </td>
                        <td class="text-center">{{number_format($c['gia'], 0, ',', '.') }} VNĐ</td>
                        <td class="text-center">{{number_format($c['thanhtien'], 0, ',', '.') }} VNĐ</td>
                       
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Giỏ hàng của bạn hiện đang trống</td>
                </tr>
            @endif
        
        
           
            <tfoot>
              @if ($cart && count($cart) > 0)
                  <tr>
                      <th colspan="6" class="soluongtien text-center">
                          Số lượng sản phẩm: {{$tongsoluong}} . Tổng tiền: {{number_format($tongtien, 0, ',', '.') }} VNĐ
                      </th>
                      {{-- <th colspan="3" class="text-center">
                          <button type="submit" class="btn btn-outline-warning" style="width: 100%; border: 2px solid rgb(144, 157, 252);" id="btnThanhToan">Thanh toán</button>
                      </th> --}}
                  </tr>
              @endif
          </tfoot>
        </table>
       

         {{-- @method('PUT') --}}
      <h3 class="text-center mt-2">Thông tin khách hàng</h3>
        <div class="m-3 mt-0 row">
          <div class="col-6">Họ và tên : 
            <input name="name" value="{{ old('name', session('customer_info.name', '')) }}" type="text" 
            class="form-control border-primary shadow-none p-2 {{ $errors->has('name') ? 'input-error' : '' }}">
            <b class="text-danger"> @error('email') {{ $message }} @enderror </b>
          </div>
          <div class="col-6"> Email :
              <input name="email" value="{{ old('email', session('customer_info.email', '')) }}" type="text" 
              class="form-control border-primary shadow-none p-2 {{ $errors->has('email') ? 'input-error' : '' }}" placeholder="Dùng email @gmail.com">
              <b class="text-danger"> @error('email') {{ $message }} @enderror </b>
          </div>
        </div>
        <div class="m-3 row">
            <div class="col-6"> Điện thoại :
                <input name="dien_thoai" value="{{ old('dien_thoai', session('customer_info.dien_thoai', '')) }}" type="text" 
                class="form-control border-primary shadow-none p-2 {{ $errors->has('dien_thoai') ? 'input-error' : '' }}">
                <b class="text-danger"> @error('dien_thoai') {{ $message }} @enderror </b>
            </div>
            <div class="col-6"> Địa chỉ :
                <input name="dia_chi" value="{{ old('dia_chi', session('customer_info.dia_chi', '')) }}" type="text" 
                class="form-control border-primary shadow-none p-2 {{ $errors->has('dia_chi') ? 'input-error' : '' }}" placeholder="Số nhà - Đường - Phường - Quận">
                <b class="text-danger"> @error('dia_chi') {{ $message }} @enderror </b>
            </div>
        </div>     
      <div class=" m-3 text-center"> 
        <span class="mr-3 fs-5">Hình thức thanh toán : </span><br>
        <select name="loai_thanh_toan" id="payment-method">
          <option value="0">Thanh toán bằng tiền mặt</option>
          {{-- <option value="1">Chuyển khoản</option> --}}
        </select>
      </div>
      {{-- <div id="bank-transfer-info" style="display: none;">
        <div class="col-6 m-3">
                <div class="card-body">
                    <h4>Thông tin chuyển khoản:</h4>
                    <p>Tên ngân hàng: Ngân hàng XYZ</p>
                    <p>Tên chủ tài khoản: Tiêu Anh Cường</p>
                    <p>Số tài khoản: 0909187402</p>
                </div>
        </div>
        <div class="col-6 m-3">
                <div class="card-body">
                    <img src="/images/maQRzalo.jpg" alt="QR Code" style="width: 100px" class="img-fluid card-img-top" />
                    <span>Vui lòng quét mã QR hoặc chuyển khoản đến số tài khoản bên trái.</span>
                </div>
        </div>
      </div> --}}
    
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-success fs-5">Đặt hàng</button>
    </div>
      <script>
        document.getElementById('payment-method').addEventListener('change', function() {
            const bankTransferInfo = document.getElementById('bank-transfer-info');
            bankTransferInfo.style.display = this.value == '1' ? 'block' : 'none';
        });
      </script>
      <script>
        document.getElementById('payment-method').addEventListener('change', function() {
            const bankTransferInfo = document.getElementById('bank-transfer-info');
            if (this.value == '1') { // Nếu chọn "Chuyển khoản"
                bankTransferInfo.style.display = 'flex'; // Hiện với d-flex
            } else {
                bankTransferInfo.style.display = 'none'; // Ẩn khi không chọn
            }
        });
      </script>
      {{-- <script>
          $(document).ready(function() {
              $('#order-form').on('submit', function(event) {
                  event.preventDefault(); // Ngăn chặn hành động mặc định
      
                  $.ajax({
                      type: 'POST',
                      url: $(this).attr('action'),
                      data: $(this).serialize(),
                    //   success: function(response) {
                    //       // Xử lý phản hồi thành công ở đây (hiển thị thông báo, làm mới thông tin đơn hàng, v.v.)
                    //       alert('Đặt hàng thành công!');
                    //   },
                    error: function(xhr) {
                    // Xử lý lỗi ở đây
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        // Hiển thị thông báo lỗi mà không làm mới trang
                        $('#error-message').text(xhr.responseJSON.error).show();
                    } else {
                        $('#error-message').text('Đã xảy ra lỗi, vui lòng thử lại!').show();
                    }
                }
                  });
              });
          });
      </script> --}}
      
    
    
    
      @endif
    </table>
    </div>
@endsection
