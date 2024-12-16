<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class themtintucValid extends FormRequest{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'ngay_dang' => 'required|date',  // Kiểm tra ngày tháng
            'anh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',   // Chỉ lưu tên ảnh
            ];
    }
    public function messages() {
        return [
            'tieu_de.required' => 'Phải nhập tiêu đề.',
            'tieu_de.string' => 'Tiêu đề phải là một chuỗi.',
            'tieu_de.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'noi_dung.required' => 'Phải nhập nội dung.',
            'noi_dung.string' => 'Nội dung phải là một chuỗi.',
            'ngay_dang.required' => 'Phải chọn ngày.',
            'ngay_dang.date' => 'Ngày đăng phải là một ngày hợp lệ.',
            'anh.required' => 'Phải chọn ảnh.',
            'anh.image' => 'Ảnh phải là một tệp hình ảnh.',
            'anh.mimes' => 'Ảnh chỉ được chấp nhận định dạng: jpeg, png, jpg, gif, svg.',
            'anh.max' => 'Kích thước ảnh không được vượt quá 2MB.',
         
       ];
     }

}
