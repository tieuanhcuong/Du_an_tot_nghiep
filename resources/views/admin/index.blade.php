@extends('admin/layoutadmin')
@section('title') Trang chủ admin  @endsection
@section('noidungchinh')
@if(session()->has('thongbao'))
<div class="alert alert-danger p-3 mx-auto my-3 col-10 fs-5  text-center">
    {!! session('thongbao') !!}
</div>
@endif
@if(session()->has('thongbao2'))
    <div class="alert alert-success p-3 mx-auto my-3 col-10 fs-5  text-center">
        {!! session('thongbao2') !!}
    </div>
@endif
    {{-- <div style="margin-right: 30px" class="text-end position-relative">
        <i class="fas fa-bell mt-2" style="font-size: 40px" data-bs-toggle="modal" data-bs-target="#notificationModal"></i>
        @if($tongtatca > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-1">
                {{ $tongtatca }}
            </span>
        @endif
    </div>
    <!-- Modal thông báo -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Thông báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(!empty($canh_bao_san_pham))
                        <h6>Cảnh báo sản phẩm:</h6>
                        <ul>
                            @foreach ($canh_bao_san_pham as $canh_bao)
                                <li>{!! $canh_bao !!}</li>
                            @endforeach
                        </ul>
                    @endif
                    <hr>
                    @if(!empty($canh_bao_tra_hang))
                        <h6>Thông báo yêu cầu trả hàng:</h6>
                        <ul>
                            @foreach ($canh_bao_tra_hang as $canh_bao)
                                <li>{!! $canh_bao !!}</li>
                            @endforeach <br>
                            <a href="{{route('donhang.tralai')}}">Danh sách yêu cầu trả hàng</a>
                        </ul>
                    @endif
                    @if(empty($canh_bao_san_pham) && empty($canh_bao_tra_hang))
                        <p>Không có thông báo nào.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <style>
    .modal-content {
        background-color: #fff; /* Màu trắng */
        border: 1px solid #dee2e6; /* Màu viền nhẹ */
    }

    .modal-header {
        border-bottom: 1px solid #dee2e6; /* Viền dưới */
    }

    .modal-footer {
        border-top: 1px solid #dee2e6; /* Viền trên */
    }
    .badge {
        font-size: 1.25rem; 
        padding: 5px; 
        min-width: 30px; 
        text-align: center; 
    }
    </style> --}}


    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
    
            <!-- Sidebar -->

            {{-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">TheGioiDiDong</div>
                </a>
    
                <hr class="sidebar-divider my-0">
    
                <li class="nav-item active">
                    <a class="nav-link" href="/admin">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Trang Chủ</span></a>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Quản lý loại</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Chức năng:</h6>
                            <a class="collapse-item" href="/admin/loai/create">Thêm loại</a>
                            <a class="collapse-item" href="/admin/loai">Danh sách loại</a>
                        </div>
                    </div>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Quản lý sản phẩm</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Chức năng:</h6>
                            <a class="collapse-item" href="/admin/sanpham/create">Thêm sản phẩm</a>
                            <a class="collapse-item" href="/admin/sanpham">Danh sách sản phẩm</a>
                            <a class="collapse-item" href="{{route('admin.khuyenmai')}}">Danh sách sản phẩm khuyến mãi</a>
                            <a class="collapse-item" href="{{ route('sanpham.canh_bao') }}">Danh sách sản phẩm sắp hết hàng</a>
                        </div>
                    </div>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Quản lý đơn hàng</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Chức năng:</h6>
                            <a class="collapse-item" href="/admin/donhang">Danh sách đơn hàng</a>
                            <a class="collapse-item" href="/admin/donhangxacnhan">Danh sách đơn hàng đã xác nhận</a>
                            <a class="collapse-item" href="/admin/donhangdahuy">Đơn hàng đã hủy</a>
                            <a class="collapse-item" href="/admin/donhangquashipper">Đơn hàng qua shipper</a>
                            <a class="collapse-item" href="/admin/donhangdaxong">Đơn hàng đã giao thành công</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Quản lý trả hàng</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Chức năng:</h6>
                            <a class="collapse-item" href="/admin/donhangtralai">Đơn hàng yêu cầu trả lại</a>
                            <a class="collapse-item" href="/admin/donhangdachopheptralai">Đơn hàng cho phép trả lại</a>
                            <a class="collapse-item" href="/admin/donhangdatuchoi">Đơn hàng từ chối trả lại</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Quản lý User</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Chức năng:</h6>
                            <a class="collapse-item" href="/admin/user/create">Thêm user</a>
                            <a class="collapse-item" href="/admin/user">Danh sách user</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Quản lý liên hệ</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Chức năng:</h6>
                            <a class="collapse-item" href="{{ route('admin.lienhe') }}">Danh sách liên hệ</a>
                        </div>
                    </div>
                </li>
    
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
    
              
    
            </ul> --}}

            <!-- End of Sidebar -->
    
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">
                    <div class="container-fluid">
    
                        <!-- Page Heading -->
                        <div class="d-sm-flex bg-gradient-dark text-white align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-white p-2">Dashboard</h1>
                            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                        </div>
    
                        <!-- Content Row -->
                        <div class="row">
    
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-6 col-md-6 col-sm-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <a style="text-decoration: none" href="/admin/loai">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Loại sản phẩm</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_loai }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
    
                            
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <a style="text-decoration: none" href="/admin/user">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Khách hàng</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_kh }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <a style="text-decoration: none" href="{{ route('admin.lienhe') }}">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Liên hệ</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_lh }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <a style="text-decoration: none" href="{{ route('admin.binhluan')}}">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Bình luận</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_binhluan }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <a style="text-decoration: none" href="{{ route('admin.tin_tuc.index')}}">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Tin tức</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_tintuc }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <a style="text-decoration: none" href="{{ route('admin.danhgia_ds')}}">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Đánh giá</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_danhgia }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a style="text-decoration: none" href="/admin/sanpham">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Sản phẩm</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_sanpham }}</div>
                                                </a>
                                            </div>
                                            <div class="col mr-2">
                                                <a style="text-decoration: none" href="{{route('sanpham.canh_bao')}}">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Sắp hết hàng</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_sanpham_saphethang }}</div>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <a style="text-decoration: none" href="/admin/donhang">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Đơn hàng</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_donhang }}</div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a style="text-decoration: none" href="/admin/donhangdahuy">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Đã hủy</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_donhang_dahuy }}</div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a style="text-decoration: none" href="/admin/donhangxacnhan">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Đang chuẩn bị</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_donhang_dangchuanbi }}</div>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a style="text-decoration: none" href="/admin/donhangdaxong">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Đã xong</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_donhang_daxong }}</div>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <a style="text-decoration: none" href="/admin/donhangtralai">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <a style="text-decoration: none" href="/admin/donhangtralai">
                                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                            Trả hàng</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_trahang }}</div>
                                                    </a>
                                                </div>
                                                <div class="col mr-2">
                                                    <a style="text-decoration: none" href="/admin/donhangdachopheptralai">
                                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                            Cho phép</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_trahang_chophep }}</div>
                                                    </a>
                                                </div>
                                                <div class="col mr-2">
                                                    <a style="text-decoration: none" href="/admin/donhangdatuchoi">
                                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                            Từ chối</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tong_trahang_tuchoi }}</div>
                                                    </a>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <a style="text-decoration: none" href="{{ route('admin.doanhthu')}}">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                        Doanh thu</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($tong_doanhthu, 0, ',', '.') }} VND</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Earnings (Monthly) Card Example -->
                            {{-- <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn hàng
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
    
                            <!-- Pending Requests Card Example -->
                            {{-- <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Pending Requests</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
    
                        <!-- Content Row -->
    
                        <div class="col-md-12">
                            <h3 class="bg-gradient-dark text-white p-2">5 Sản phẩm bán chạy nhất</h3>
                        
                            @if($spBanChay->isEmpty())  <!-- Kiểm tra nếu không có sản phẩm bán chạy -->
                                <div class="alert alert-warning text-center">
                                    Chưa có sản phẩm bán chạy.
                                </div>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình</th>
                                            <th>Lượt mua</th>
                                            <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($spBanChay as $sp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sp->ten_sp }}</td>
                                                <td><img src="{{ $sp->hinh }}" alt="" width="100px"></td>
                                                <td>{{ $sp->sl_mua }}</td>
                                                <td>{{ number_format($sp->gia_km, 0, ',', '.') }} đ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        

                        {{-- <div class="row">
    
                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-primary"></i> Direct
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i> Social
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info"></i> Referral
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
    
                        <!-- Content Row -->
                        {{-- <div class="row">
    
                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">
    
                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="small font-weight-bold">Server Migration <span
                                                class="float-right">20%</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="small font-weight-bold">Sales Tracking <span
                                                class="float-right">40%</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="small font-weight-bold">Customer Database <span
                                                class="float-right">60%</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="small font-weight-bold">Payout Details <span
                                                class="float-right">80%</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="small font-weight-bold">Account Setup <span
                                                class="float-right">Complete!</span></h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Color System -->
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-primary text-white shadow">
                                            <div class="card-body">
                                                Primary
                                                <div class="text-white-50 small">#4e73df</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-success text-white shadow">
                                            <div class="card-body">
                                                Success
                                                <div class="text-white-50 small">#1cc88a</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-info text-white shadow">
                                            <div class="card-body">
                                                Info
                                                <div class="text-white-50 small">#36b9cc</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-warning text-white shadow">
                                            <div class="card-body">
                                                Warning
                                                <div class="text-white-50 small">#f6c23e</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-danger text-white shadow">
                                            <div class="card-body">
                                                Danger
                                                <div class="text-white-50 small">#e74a3b</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-secondary text-white shadow">
                                            <div class="card-body">
                                                Secondary
                                                <div class="text-white-50 small">#858796</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-light text-black shadow">
                                            <div class="card-body">
                                                Light
                                                <div class="text-black-50 small">#f8f9fc</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-dark text-white shadow">
                                            <div class="card-body">
                                                Dark
                                                <div class="text-white-50 small">#5a5c69</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="col-lg-6 mb-4">
    
                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                                src="img/undraw_posting_photo.svg" alt="...">
                                        </div>
                                        <p>Add some quality, svg illustrations to your project courtesy of <a
                                                target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                            constantly updated collection of beautiful svg images that you can use
                                            completely free and without attribution!</p>
                                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                            unDraw &rarr;</a>
                                    </div>
                                </div>
    
                                <!-- Approach -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                    </div>
                                    <div class="card-body">
                                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                            CSS bloat and poor page performance. Custom CSS classes are used to create
                                            custom components and custom utility classes.</p>
                                        <p class="mb-0">Before working with this theme, you should become familiar with the
                                            Bootstrap framework, especially the utility classes.</p>
                                    </div>
                                </div>
    
                            </div>
                        </div> --}}
    
                    </div>
                    <!-- /.container-fluid -->
    
                </div>
                <!-- End of Main Content -->
    
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; MobiCenter 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    
    
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
    
        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
    
    </body>
    
@endsection
