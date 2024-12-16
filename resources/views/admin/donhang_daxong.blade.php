@extends('admin/layoutadmin')
@section('title') Danh sách đơn hàng đã giao thành công @endsection
@section('noidungchinh')
@if(session()->has('thongbao'))
    <div class="alert alert-danger p-3 mx-auto my-3 col-10 fs-5  text-center">
        {!! session('thongbao') !!}
    </div>
@endif


<table class="table table-bordered m-auto" id="dsdonhang">
    <div style="margin-left: 0px; margin-right: 0px" class="row bg-gradient-dark text-white fw-bolder">
        <div class="col-6">
            <label class="mt-2 mb-2">DANH SÁCH ĐƠN HÀNG ĐÃ XONG</label>
        </div>
        <div class="col-6 text-end">
            <label class="mt-2 mb-2"><a style="text-decoration: none; color: white" href="{{url('/admin/donhang')}}">Về danh sách đơn hàng</a></label>
        </div>
    </div>
    @if(session()->has('thongbao2'))
        <div class="alert alert-success p-3 mx-auto my-3 col-10 fs-5  text-center">
            {!! session('thongbao2') !!}
        </div>
    @endif
    @if($donhang5->isEmpty())
        <div class="alert alert-info p-3 mx-auto my-3 col-10 fs-5 text-center">
            Chưa có đơn hàng nào đã được khách hàng xác nhận.
        </div>
    @else
    
    {{-- <select id="trangthai" class="py-1 px-3 shadow-none" onchange="loctrangthai(this.value)">
        <option value="daxoa" {{$trangthai == "daxoa"? "selected":""}}>Đơn hàng đã xóa</option>
    </select>
    <script>
    function loctrangthai(tt){
        document.location=`/admin/donhang?trangthai=${tt}`;
    }
    </script> --}}
        <thead class="text-center">
            <tr>
                <th style="width: 80px">ID <br> đơn hàng</th>
                <th style="width: 100px">Họ và tên Email <br> Điện thoại Địa chỉ </th>
                <th style="width: 150px">Thời gian <br> Tổng số lượng <br>Tổng tiền</th>
                <th style="width: 130px">Trạng thái & Thanh toán</th>
                <th style="width: 100px">Loại<br>Thanh toán & <br> Thời gian đã giao</th>
                <th style="width: 50px">Chi tiết</th>
                {{-- <th style="width: 90px">Hoàn thành</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($donhang5 as $dh)
                <tr>
                    <td class="text-center">{{ $dh->id }}</td>
                    <td><span style="font-weight: bold">Tên:</span> {{ $dh->ten_nguoi_nhan }}<br><span style="font-weight: bold">Email:</span>  {{ $dh->email }} <br> <span style="font-weight: bold">SĐT:</span> {{ $dh->dien_thoai }}<br><span style="font-weight: bold">Address:</span>  {{ $dh->dia_chi_giao }}</td>
                    <td><span style="font-weight: bold">Thời gian: </span>{{date('d/m/Y',strtotime($dh->thoi_diem_mua_hang))}} <br><span style="font-weight: bold">SL:</span> {{ $dh->tong_so_luong }}<br><span style="font-weight: bold">Tiền:</span> {{ number_format( $dh->tong_tien , 0 , "," , ".") }} VNĐ</td>


                    <td>Đã nhận được hàng & 
                        Đã thanh toán
                    </td>
                    <td>{{ $dh->loai_thanh_toan==0? "Thanh toán khi nhận hàng":"Chuyển khoản" }} <br>
                        <span style="font-weight: bold">Thời gian giao hàng: </span>{{date('H:i:s d/m/Y',strtotime($dh->thoi_diem_giao_hang))}}
                    </td>
                    <td class="text-center"><a class="btn btn-primary btn-sm" href="{{ route('donhang.chitietxacnhan', $dh->id) }}">Chi tiết sản phẩm</a></td>
                    {{-- <td class="text-center">
                        <form action="{{ route('donhang.destroy', $dh->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type='submit' onclick="return confirm('Xác nhận hoàn thành đơn hàng và xóa đơn hàng này')" class="btn btn-danger btn-sm">
                                Hoàn thành đơn hàng
                            </button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
<div class="p-2 d-flex justify-content-center">{{$donhang5->links() }}</div>
@endif

<hr>


<table class="table table-bordered m-auto" id="dsdonhang">
    <div style="margin-left: 0px; margin-right: 0px" class="row bg-gradient-dark text-white fw-bolder">
        <div class="col-6">
            <label class="mt-2 mb-2">DANH SÁCH ĐƠN HÀNG ĐÃ GIAO VÀ CHỜ XÁC NHẬN TỪ KHÁCH HÀNG</label>
        </div>
        <div class="col-6 text-end">
            <label class="mt-2 mb-2"><a style="text-decoration: none; color: white" href="{{url('/admin/donhangquashipper')}}">Về danh sách đơn hàng qua shipper</a></label>
        </div>
    </div>
    @if(session()->has('thongbao2'))
        <div class="alert alert-success p-3 mx-auto my-3 col-10 fs-5  text-center">
            {!! session('thongbao2') !!}
        </div>
    @endif
    @if(session()->has('info'))
        <div class="alert alert-success p-3 mx-auto my-3 col-10 fs-5  text-center">
            {!! session('info') !!}
        </div>
    @endif
    @if($donhang4->isEmpty())
        <div class="alert alert-info p-3 mx-auto my-3 col-10 fs-5 text-center">
            Chưa có đơn hàng nào đã được giao thành công.
        </div>
    @else
        <thead class="text-center">
            <tr>
                <th style="width: 80px">ID <br> đơn hàng</th>
                <th style="width: 100px">Họ và tên Email <br> Điện thoại Địa chỉ </th>
                <th style="width: 150px">Thời gian <br> Tổng số lượng <br>Tổng tiền</th>
                <th style="width: 130px">Trạng thái & Thanh toán</th>
                <th style="width: 100px">Loại<br>Thanh toán & <br> Thời gian đã giao</th>
                <th style="width: 50px">Chi tiết</th>
                <th style="width: 100px">Gửi email</th>
                <th style="width: 100px">KH đã thanh toán</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donhang4 as $dh)
                <tr>
                    <td class="text-center">{{ $dh->id }}</td>
                    <td><span style="font-weight: bold">Tên:</span> {{ $dh->ten_nguoi_nhan }}<br><span style="font-weight: bold">Email:</span>  {{ $dh->email }} <br> <span style="font-weight: bold">SĐT:</span> {{ $dh->dien_thoai }}<br><span style="font-weight: bold">Address:</span>  {{ $dh->dia_chi_giao }}</td>
                    <td><span style="font-weight: bold">Thời gian: </span>{{date('d/m/Y',strtotime($dh->thoi_diem_mua_hang))}} <br><span style="font-weight: bold">SL:</span> {{ $dh->tong_so_luong }}<br><span style="font-weight: bold">Tiền:</span> {{ number_format( $dh->tong_tien , 0 , "," , ".") }} VNĐ</td>


                    <td>Đã giao thành công &
                        @if ($dh->trang_thai_thanh_toan == 0)
                            Chưa thanh toán
                        @elseif ($dh->trang_thai_thanh_toan == 2)
                            Đã thanh toán
                        @else
                            Không xác định
                        @endif
                    </td>
                    <td>{{ $dh->loai_thanh_toan==0? "Thanh toán khi nhận hàng":"Chuyển khoản" }} <br>
                        <span style="font-weight: bold">Thời gian giao hàng: </span>{{date('H:i:s d/m/Y',strtotime($dh->thoi_diem_giao_hang))}}
                    </td>
                    <td class="text-center"><a class="btn btn-primary btn-sm" href="{{ route('donhang.chitietxacnhan', $dh->id) }}">Chi tiết sản phẩm</a></td>
                    <td class="text-center">
                        @php
                            $soLanGuiEmail = session("so_lan_gui_email_{$dh->id}", 0);
                        @endphp
                    
                        @if ($soLanGuiEmail < 3)
                            <form action="{{ route('donhang.guilai', $dh->id) }}" method="POST" style="display:inline;">
                                @csrf @method('PATCH')
                                <button type='submit' onclick="return confirm('Gửi mail cho khách hàng để xác nhận đơn hàng')" class="btn btn-danger btn-sm">
                                    Gửi yêu cầu xác nhận lại email
                                </button>
                            </form>
                        @else
                            <span class="text-danger">Đã gửi yêu cầu xác nhận email 3 lần, không thể gửi thêm.</span>
                        @endif
                    </td>
                    <td><a class="btn btn-primary btn-sm" href="{{ route('donhang.thanhtoanvaxacnhan', ['id' => $dh->id]) }}">Xác nhận đã nhận hàng</a>
                    </td>
                    
                  
                </tr>
            @endforeach
        </tbody>
</table>

<div class="p-2 d-flex justify-content-center">{{$donhang4->links() }}</div>
@endif
@endsection
