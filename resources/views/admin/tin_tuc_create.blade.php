@extends('admin/layoutadmin')
@section('title') Thêm tin tức  @endsection
@section('noidungchinh')
<div class="container-fluid">
    <h2 class="my-4">Thêm Tin Tức Mới</h2>
    <style>
        .input-error { 
            border: 2px solid rgb(132, 134, 246);
        }
    </style>
    <form action="{{ route('admin.tin_tuc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="tieu_de">Tiêu Đề</label>
            <input type="text" name="tieu_de" class="form-control {{ $errors->has('tieu_de') ? 'input-error' : '' }}" id="tieu_de">
            <b style="font-size: 15px" class="text-danger"> @error('tieu_de') {{ $message }} @enderror </b>

        </div>

        <div class="form-group">
            <label for="noi_dung">Nội Dung</label>
            <textarea name="noi_dung" class="form-control {{ $errors->has('noi_dung') ? 'input-error' : '' }}" id="noi_dung" rows="5"></textarea>
            <b style="font-size: 15px" class="text-danger"> @error('noi_dung') {{ $message }} @enderror </b>

        </div>

        <div class="form-group">
            <label for="anh">Ảnh</label>
            <input type="file" name="anh" class="form-control {{ $errors->has('anh') ? 'input-error' : '' }}" id="anh">
            <b style="font-size: 15px" class="text-danger"> @error('anh') {{ $message }} @enderror </b>

        </div>

        <div class="form-group">
            <label for="ngay_dang">Ngày Đăng</label>
            <input type="date" name="ngay_dang" class="form-control {{ $errors->has('ngay_dang') ? 'input-error' : '' }}" id="ngay_dang">
            <b style="font-size: 15px" class="text-danger"> @error('ngay_dang') {{ $message }} @enderror </b>

        </div>

        <button type="submit" class="btn btn-primary mt-3">Lưu</button>
    </form>
</div>
@endsection
