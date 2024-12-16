<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class themloaiValid extends FormRequest{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'ten_loai' => ['required','min:2', 'max:30'], // Chỉ cho phép ký tự chữ và khoảng trắng
            'thu_tu' => 'required',
            ];
    }
    public function messages() {
        return [
            'ten_loai' => 'Phải nhập tên loại nha bạn ơi',
            'ten_loai.min' => 'Nhập tên loại ít nhất 2 ký tự',
            'ten_loai.max' => 'Tên loại gì mà dài quá thế',
            'thu_tu.required' => 'Chưa chọn thứ tự',
         
       ];
     }

}
