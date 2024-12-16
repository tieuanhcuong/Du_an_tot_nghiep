@extends('layout')

@section('title', 'Kết quả tìm kiếm')

@section('noidungchinh')
    <h2 class="text-center mt-3">Kết quả tìm kiếm cho "{{ $search }}"</h2>

    @if($sptrongloai_arr->isEmpty())
        <p class="text-center">Không có sản phẩm nào phù hợp với tìm kiếm của bạn.</p>
        <p class="text-center">Mời bạn tìm kiếm sản phẩm khác.</p>
    @else
        <div class="row">
            @foreach($sptrongloai_arr as $sp)
            <div class="col-6 col-md-3 p-2">
                <a href="/sp/{{$sp->id}}" class="text-decoration-none text-dark fs-5">
                    <div class="product-card border border-secondary shadow-sm rounded text-center bg-white d-flex flex-column"
                        style="width: 100%; height: 100%;">
                        <img src="{{$sp->hinh}}" class="product-img img-fluid border-0">
                        <div class="product-content flex-grow-1 d-flex flex-column justify-content-between">
                            <h5 class="mt-3">{{$sp->ten_sp}}</h5>
                            <div class='fw-bold text-danger fs-6 mb-2'>
                                {{ number_format($sp->gia_km, 0, ",", ".") }} đ <br>
                                <span class="product-views text-muted small ">{{ $sp->luot_xem }} lượt xem</span>
                                <span class="product-views text-muted small ">&</span>
                                <span class="product-purchases text-muted small ">{{ $sp->luot_mua }} lượt mua</span>
                            </div>
                    </div>
                </a>
                <button type="button" class="btn btn-sm btn-primary mb-2 mx-auto btn-add-to-cart" onclick="addToCart({{ $sp->id }}, 1)">
                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                </button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="p-2 d-flex justify-content-center">{{$sptrongloai_arr->links() }}</div>
    @endif
    <style>
        /* .col-md-3 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        } */
        h3.fs-5 {
            min-height: 50px;
        }
    
        /* Hình ảnh sản phẩm */
        .product-img {
            /* height: 200px; */
            object-fit: cover;
        }
    
        @media (max-width: 768px) {
    
            /* Hình ảnh nhỏ hơn trên mobile */
            .product-img {
                height: 200px;
            }
    
            /* Font chữ nhỏ hơn */
            .product-title {
                font-size: 0.9rem;
            }
    
            /* Khoảng cách giữa nội dung và hình ảnh */
            .product-content {
                padding: 5px;
            }
    
            /* Nút thêm vào giỏ hàng nhỏ hơn */
            .btn-add-to-cart {
                font-size: 0.8rem;
                padding: 5px 10px;
            }
        }
    
        @media (max-width: 576px) {
    
            /* Chiều cao ảnh giảm thêm trên màn hình nhỏ */
            .product-img {
                height: auto;
            }
            .lx{
                display: flex;
                margin-left: 30px;
            }
        }
    </style>
@endsection






{{-- @extends('layout')

@section('title', 'Kết quả tìm kiếm')

@section('noidungchinh')
    <h2 class="text-center mt-3">Kết quả tìm kiếm cho "{{ $search }}"</h2>

    <div class="row mr-0">
        <div class="row align-items-center gx-4 gy-2">
            <div class="col-md-12 col-12">
                <form method="GET" action="{{ route('sanpham.timkiem', $id_loai) }}" class="row gx-2 gy-2 align-items-center">
                    <!-- RAM -->
                    <div class="col-md-2 col-6">
                        <select name="ram" class="form-select">
                            <option value="">Chọn RAM</option>
                            <option value="4GB" {{ request('ram') == '4GB' ? 'selected' : '' }}>4GB</option>
                            <option value="8GB" {{ request('ram') == '8GB' ? 'selected' : '' }}>8GB</option>
                            <option value="12GB" {{ request('ram') == '12GB' ? 'selected' : '' }}>12GB</option>
                            <option value="16GB" {{ request('ram') == '16GB' ? 'selected' : '' }}>16GB</option>
                        </select>
                    </div>
                    <!-- Bộ nhớ -->
                    <div class="col-md-2 col-6">
                        <select name="bo_nho" class="form-select">
                            <option value="">Chọn bộ nhớ</option>
                            <option value="64GB" {{ request('bo_nho') == '64GB' ? 'selected' : '' }}>64GB</option>
                            <option value="128GB" {{ request('bo_nho') == '128GB' ? 'selected' : '' }}>128GB</option>
                            <option value="256GB" {{ request('bo_nho') == '256GB' ? 'selected' : '' }}>256GB</option>
                            <option value="512GB" {{ request('bo_nho') == '512GB' ? 'selected' : '' }}>512GB</option>
                            <option value="1TB" {{ request('bo_nho') == '1TB' ? 'selected' : '' }}>1TB</option>
                        </select>
                    </div>
                    <!-- Màu sắc -->
                    <div class="col-md-2 col-6">
                        <select name="mau_sac" class="form-select">
                            <option value="">Chọn màu</option>
                            <option value="Đen" {{ request('mau_sac') == 'Đen' ? 'selected' : '' }}>Đen</option>
                            <option value="Xám" {{ request('mau_sac') == 'Xám' ? 'selected' : '' }}>Xám</option>
                            <option value="Trắng" {{ request('mau_sac') == 'Trắng' ? 'selected' : '' }}>Trắng</option>
                            <option value="Bạc" {{ request('mau_sac') == 'Bạc' ? 'selected' : '' }}>Bạc</option>
                            <option value="Đỏ" {{ request('mau_sac') == 'Đỏ' ? 'selected' : '' }}>Đỏ</option>
                        </select>
                    </div>
                    <!-- Camera -->
                    <div class="col-md-2 col-6">
                        <select name="camera_chinh" class="form-select">
                            <option value="">Camera chính</option>
                            <option value="12MP" {{ request('camera_chinh') == '12MP' ? 'selected' : '' }}>12MP</option>
                            <option value="16MP" {{ request('camera_chinh') == '16MP' ? 'selected' : '' }}>16MP</option>
                            <option value="48MP" {{ request('camera_chinh') == '48MP' ? 'selected' : '' }}>48MP</option>
                            <option value="64MP" {{ request('camera_chinh') == '64MP' ? 'selected' : '' }}>64MP</option>
                            <option value="108MP" {{ request('camera_chinh') == '108MP' ? 'selected' : '' }}>108MP</option>
                        </select>
                    </div>
                    <!-- Pin -->
                    <div class="col-md-2 col-6">
                        <select name="pin" class="form-select">
                            <option value="">Chọn pin</option>
                            <option value="3000mAh" {{ request('pin') == '3000mAh' ? 'selected' : '' }}>3000mAh</option>
                            <option value="4000mAh" {{ request('pin') == '4000mAh' ? 'selected' : '' }}>4000mAh</option>
                            <option value="5000mAh" {{ request('pin') == '5000mAh' ? 'selected' : '' }}>5000mAh</option>
                        </select>
                    </div>
                    <!-- Khoảng giá -->
                    <div class="col-md-2 col-6">
                        <select name="gia_km" class="form-select">
                            <option value="">Khoảng giá</option>
                            <option value="0-5000000" {{ request('gia_km') == '0-5000000' ? 'selected' : '' }}>Dưới 5 triệu</option>
                            <option value="5000000-10000000" {{ request('gia_km') == '5000000-10000000' ? 'selected' : '' }}>5 triệu - 10 triệu</option>
                            <option value="10000000-20000000" {{ request('gia_km') == '10000000-20000000' ? 'selected' : '' }}>10 triệu - 20 triệu</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Hiển thị sản phẩm sau khi lọc -->
        <div class="row">
            @if($noProducts)
                <div class="col-12 text-center">Không tìm thấy sản phẩm nào.</div>
            @else
            <div class="row">
                @foreach($sptrongloai_arr as $sp)
                <div class="col-6 col-md-3 p-2">
                    <a href="/sp/{{$sp->id}}" class="text-decoration-none text-dark fs-5">
                        <div class="product-card border border-secondary shadow-sm rounded text-center bg-white d-flex flex-column"
                            style="width: 100%; height: 100%;">
                            <img src="{{$sp->hinh}}" class="product-img img-fluid border-0">
                            <div class="product-content flex-grow-1 d-flex flex-column justify-content-between">
                                <h5 class="mt-3">{{$sp->ten_sp}}</h5>
                                <div class='fw-bold text-danger fs-6 mb-2'>
                                    {{ number_format($sp->gia_km, 0, ",", ".") }} đ <br>
                                    <span class="product-views text-muted small ">{{ $sp->luot_xem }} lượt xem</span>
                                    <span class="product-views text-muted small ">&</span>
                                    <span class="product-purchases text-muted small ">{{ $sp->luot_mua }} lượt mua</span>
                                </div>
                        </div>
                    </a>
                    <button type="button" class="btn btn-sm btn-primary mb-2 mx-auto btn-add-to-cart" onclick="addToCart({{ $sp->id }}, 1)">
                        <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                    </button>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Hiển thị phân trang -->
        <div class="row">
            <div class="col-12 text-center">
                {{ $sptrongloai_arr->links() }}
            </div>
        </div>
    </div>

    <style>
        /* .col-md-3 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        } */
        h3.fs-5 {
            min-height: 50px;
        }
    
        /* Hình ảnh sản phẩm */
        .product-img {
            /* height: 200px; */
            object-fit: cover;
        }
    
        @media (max-width: 768px) {
    
            /* Hình ảnh nhỏ hơn trên mobile */
            .product-img {
                height: 200px;
            }
    
            /* Font chữ nhỏ hơn */
            .product-title {
                font-size: 0.9rem;
            }
    
            /* Khoảng cách giữa nội dung và hình ảnh */
            .product-content {
                padding: 5px;
            }
    
            /* Nút thêm vào giỏ hàng nhỏ hơn */
            .btn-add-to-cart {
                font-size: 0.8rem;
                padding: 5px 10px;
            }
        }
    
        @media (max-width: 576px) {
    
            /* Chiều cao ảnh giảm thêm trên màn hình nhỏ */
            .product-img {
                height: auto;
            }
            .lx{
                display: flex;
                margin-left: 30px;
            }
        }
    </style>
@endsection --}}
