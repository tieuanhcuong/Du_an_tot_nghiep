@extends('admin/layoutadmin')
@section('title') Thêm sản phẩm  @endsection
@section('noidungchinh')
<form id="frm" method="post" action="{{route('sanpham.store')}}" 
enctype="multipart/form-data" class="m-auto w-10 border border-primary" > @csrf
    <h4 class="m-0 bg-gradient-dark text-white p-2 fs-5"> THÊM SẢN PHẨM</h4>
    <style>
        .input-error { 
            border: 2px solid rgb(132, 134, 246);
        }
    </style>
    <div class="mb-3 row px-2">
        <div class='col-6'> Tên sản phẩm 
            <input name="ten_sp" value="{{old('ten_sp')}}" type="text" class="form-control shadow-none {{ $errors->has('ten_sp') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('ten_sp') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'> Ngày 
            <input name="ngay" value="{{old('ngay')}}" type="date" class="form-control shadow-none {{ $errors->has('ngay') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('ngay') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Giá  
           <input name="gia" value="{{old('gia')}}" type="number" class="form-control shadow-none {{ $errors->has('gia') ? 'input-error' : '' }}" min="1">
           <b style="font-size: 15px" class="text-danger"> @error('gia') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'> Giá km
            <input name="gia_km" value="{{old('gia_km')}}" type="number" class="form-control shadow-none {{ $errors->has('gia_km') ? 'input-error' : '' }}" min="1">
            <b style="font-size: 15px" class="text-danger"> @error('gia_km') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class="mb-3 row px-2">    
        <div class='col-6 p-2 pl-2'> 
            <select name="id_loai" class="form-control shadow-none {{ $errors->has('id_loai') ? 'input-error' : '' }}">
                <option value="-1">Chọn loại</option>
                @foreach($loai_arr as $loai)
                    <option value="{{ $loai->id }}" {{ old('id_loai') == $loai->id ? 'selected' : '' }}>{{ $loai->ten_loai }}</option>
                @endforeach
            </select>
            <b style="font-size: 15px" class="text-danger"> @error('id_loai') {{ $message }} @enderror </b>
        </div>
        
         
        <div class='col-6'>
            <select name="tinh_chat" class="form-control shadow-none {{ $errors->has('tinh_chat') ? 'input-error' : '' }}">
                <option value="0">Tính chất</option>
                <option value="1" {{ old('tinh_chat') == 1 ? 'selected' : '' }}>Bình thường</option>
                <option value="2" {{ old('tinh_chat') == 2 ? 'selected' : '' }}>Giá rẻ</option>
                <option value="3" {{ old('tinh_chat') == 3 ? 'selected' : '' }}>Giảm sốc</option>
                <option value="4" {{ old('tinh_chat') == 4 ? 'selected' : '' }}>Cao cấp</option>
            </select>
            <b style="font-size: 15px" class="text-danger"> @error('tinh_chat') {{ $message }} @enderror </b>
        </div>
        
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6 p-2 pl-2'> 
            <input name="hinh" value="{{old('hinh')}}" type="text" class="form-control shadow-none {{ $errors->has('hinh') ? 'input-error' : '' }}" placeholder="Hình sản phẩm">
        <b style="font-size: 15px" class="text-danger"> @error('hinh') {{ $message }} @enderror </b>
        </div>  
        <div class='col-2 pt-3'> 
            <input name="an_hien" type="radio" value="0"> Ẩn
            <input name="an_hien" type="radio" value="1" checked> Hiện
        </div>
        <div class='col-2 pt-3 '> 
            <input name="hot" type="radio" value="0"> Bình thường
            <input name="hot" type="radio" value="1" checked> Nổi bật
        </div>
        <div class="col-2 text-end pt-2 ">
            <input name="so_luong_con_lai" value="{{old('so_luong_con_lai')}}" type="number" class="form-control shadow-none {{ $errors->has('so_luong_con_lai') ? 'input-error' : '' }}" min="10" placeholder="Số lượng tồn kho">
            <b style="font-size: 15px" class="text-danger"> @error('so_luong_con_lai') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class='mb-3 px-2'>
        <input name="mo_ta" value="{{old('mo_ta')}}" type="text" class="form-control shadow-none {{ $errors->has('mo_ta') ? 'input-error' : '' }}" placeholder="Mô tả sản phẩm">
        <b style="font-size: 15px" class="text-danger"> @error('mo_ta') {{ $message }} @enderror </b>
    </div>
    

    <div class="text-center fs-4">Thuộc tính</div>
     <!-- Thuộc tính sản phẩm -->
     <div class="mb-3 row px-2">
        <div class='col-6'>
            Hệ điều hành
            <input name="he_dieu_hanh" value="{{old('he_dieu_hanh')}}" type="text" class="form-control shadow-none {{ $errors->has('he_dieu_hanh') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('he_dieu_hanh') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'>
            CPU
            <input name="cpu" value="{{old('cpu')}}" type="text" class="form-control shadow-none {{ $errors->has('cpu') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('cpu') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'>
            RAM
            <input name="ram" value="{{old('ram')}}" type="text" class="form-control shadow-none {{ $errors->has('ram') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('ram') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'>
            Bộ nhớ
            <input name="bo_nho" value="{{old('bo_nho')}}" type="text" class="form-control shadow-none {{ $errors->has('bo_nho') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('bo_nho') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'>
            Màu sắc
            <input name="mau_sac" value="{{old('mau_sac')}}" type="text" class="form-control shadow-none {{ $errors->has('mau_sac') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('mau_sac') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'>
            Cân nặng
            <input name="can_nang" value="{{old('can_nang')}}" type="text" class="form-control shadow-none {{ $errors->has('can_nang') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('can_nang') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'>
            Độ phân giải màn hình
            <input name="do_phan_giai_man_hinh" value="{{old('do_phan_giai_man_hinh')}}" type="text" class="form-control shadow-none {{ $errors->has('do_phan_giai_man_hinh') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('do_phan_giai_man_hinh') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'>
            Tần số quét
            <input name="tan_so_quet" value="{{old('tan_so_quet')}}" type="text" class="form-control shadow-none {{ $errors->has('tan_so_quet') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('tan_so_quet') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'>
            Camera chính
            <input name="camera_chinh" value="{{old('camera_chinh')}}" type="text" class="form-control shadow-none {{ $errors->has('camera_chinh') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('camera_chinh') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'>
            Camera phụ
            <input name="camera_phu" value="{{old('camera_phu')}}" type="text" class="form-control shadow-none {{ $errors->has('camera_phu') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('camera_phu') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'>
            Pin
            <input name="pin" value="{{old('pin')}}" type="text" class="form-control shadow-none {{ $errors->has('pin') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('pin') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'>
            Cổng kết nối 
            <input name="cong_ket_noi" value="{{old('cong_ket_noi')}}" type="text" class="form-control shadow-none {{ $errors->has('cong_ket_noi') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('cong_ket_noi') {{ $message }} @enderror </b>
        </div>
        <div class='col-6'>
            Kết nối mạng
            <input name="ket_noi_mang" value="{{old('ket_noi_mang')}}" type="text" class="form-control shadow-none {{ $errors->has('ket_noi_mang') ? 'input-error' : '' }}">
            <b style="font-size: 15px" class="text-danger"> @error('ket_noi_mang') {{ $message }} @enderror </b>
        </div>
    </div>
    <div class='mb-3 px-2'> 
        <button type="submit" class="btn btn-dark py-2 px-5 border-0">Thêm sản phẩm mới</button>
    </div>
</form>
@endsection
