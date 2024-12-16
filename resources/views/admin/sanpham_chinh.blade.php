@extends('admin/layoutadmin')
@section('title') Chinh sản phẩm  @endsection
@section('noidungchinh')
<form id="frm" method="post" action="{{route('sanpham.update', $sp->id )}}" class="m-auto w-10 border border-primary" > 
    @csrf @method('PUT')
    <h4 class="m-0 bg-gradient-dark text-white p-2 fs-5"> CHỈNH SẢN PHẨM</h4>
    <style>
        .input-error { 
            border: 2px solid rgb(132, 134, 246);
        }
    </style>
    <div class="mb-3 row px-2">
        <div class='col-6'> Tên sản phẩm 
            <input name="ten_sp" type="text" value="{{$sp->ten_sp}}" 
            class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Ngày 
            <input name="ngay" type="date" value="{{$sp->ngay}}"
            class="form-control shadow-none border-primary" >
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Giá  
            <input name="gia" type="number" value="{{$sp->gia}}"
            class="form-control shadow-none border-primary" min="1">
        </div>
        <div class='col-6'> Giá km
          <input name="gia_km" type="number" value="{{$sp->gia_km}}"
          class="form-control shadow-none border-primary" min="1">
        </div>
    </div>
    
    <div class="mb-3 row px-2">    
        <div class='col-6'> 
            <select name="id_loai" class="form-control shadow-none border-primary">
                <option value="-1">Chọn loại</option>
                @foreach( $loai_arr as $loai)
                <option value="{{$loai->id}}" {{$loai->id==$sp->id_loai? "selected":""}} >
                    {{$loai->ten_loai}}
                </option>
                @endforeach
            </select>
        </div>   
        <div class='col-6'>
            <select name="tinh_chat" class="form-control shadow-none border-primary">
                <option value="0" {{$sp->tinh_chat==0? "selected":""}} >Tính chất</option>
                <option value="0" {{$sp->tinh_chat==0? "selected":""}} >Bình thường</option>
                <option value="1" {{$sp->tinh_chat==1? "selected":""}} >Giá rẻ</option>
                <option value="2" {{$sp->tinh_chat==2? "selected":""}} >Giảm sốc</option>
                <option value="3" {{$sp->tinh_chat==3? "selected":""}} >Cao cấp</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6 p-2'> 
            <input name="hinh" type="text" value="{{$sp->hinh}}"
            placeholder="Hình sản phẩm"
            class="form-control shadow-none border-primary">
        </div>  
        <div class='col-2 pt-3'> 
            <input name="an_hien" type="radio" value="0" {{$sp->an_hien==0? "checked":""}} > Ẩn
            <input name="an_hien" type="radio" value="1" {{$sp->an_hien==1? "checked":""}} > Hiện
        </div>
        <div class='col-2 pt-3 pe-3'> 
            <input name="hot" type="radio" value="0" {{$sp->hot==0? "checked":""}} > Bình thường
            <input name="hot" type="radio" value="1" {{$sp->hot==1? "checked":""}} > Nổi bật
        </div>
        <div class='col-2 text-end pe-3'> 
            <label for="ton_kho">Số lượng tồn kho</label>
            <input type="number" class="form-control" id="ton_kho" name="ton_kho" value="{{ old('ton_kho', $sp->ton_kho) }}" required>
        </div>        
    </div>
    <div class='mb-3 px-2'>
        <textarea name="mo_ta" rows="4" placeholder="Mô tả sản phẩm"
        class="form-control shadow-none border-primary">{{$sp->mo_ta}}</textarea>
    </div>
    <div class="text-center fs-2">Thuộc tính</div>
      <!-- Thông tin thuộc tính sản phẩm -->
      <div class="mb-3 row px-2">
        <div class='col-6'> Hệ điều hành
            <input name="he_dieu_hanh" type="text" value="{{ $sp->thuoc_tinh->he_dieu_hanh ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> CPU
            <input name="cpu" type="text" value="{{ $sp->thuoc_tinh->cpu ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> RAM
            <input name="ram" type="text" value="{{ $sp->thuoc_tinh->ram ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Bộ nhớ
            <input name="bo_nho" type="text" value="{{ $sp->thuoc_tinh->bo_nho ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Màu sắc
            <input name="mau_sac" type="text" value="{{ $sp->thuoc_tinh->mau_sac ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Cân nặng
            <input name="can_nang" type="text" value="{{ $sp->thuoc_tinh->can_nang ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Độ phân giải màn hình
            <input name="do_phan_giai_man_hinh" type="text" value="{{ $sp->thuoc_tinh->do_phan_giai_man_hinh ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Tần số quét
            <input name="tan_so_quet" type="text" value="{{ $sp->thuoc_tinh->tan_so_quet ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Camera chính
            <input name="camera_chinh" type="text" value="{{ $sp->thuoc_tinh->camera_chinh ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Camera phụ
            <input name="camera_phu" type="text" value="{{ $sp->thuoc_tinh->camera_phu ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class="mb-3 row px-2">
        <div class='col-6'> Pin
            <input name="pin" type="text" value="{{ $sp->thuoc_tinh->pin ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Cổng kết nối 
            <input name="cong_ket_noi" type="text" value="{{ $sp->thuoc_tinh->cong_ket_noi ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
        <div class='col-6'> Kết nối mạng
            <input name="ket_noi_mang" type="text" value="{{ $sp->thuoc_tinh->ket_noi_mang ?? '' }}"
            class="form-control shadow-none border-primary">
        </div>
    </div>
    <div class='mb-3 px-2'> 
        <button type="submit" class="btn btn-dark py-2 px-5 border-0">Chỉnh sửa sản phẩm</button>
    </div>
</form>
@endsection
