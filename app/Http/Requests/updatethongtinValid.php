<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class updatethongtinValid extends FormRequest{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['required','min:2', 'max:30', 'regex:/^[\p{L} ]+$/u'], // Chỉ cho phép ký tự chữ và khoảng trắng
            'email' => 'required|email|ends_with:@gmail.com',
            'dien_thoai' => 'required|min:10|regex:/^[0-9]+$/',// Chỉ cho phép ký tự số
            'dia_chi' => 'required|regex:/^[\p{L}\d\s,.-]+$/u'
            ];
    }
    public function messages() {
        return [
            'name.required' => 'Phải nhập họ tên nha bạn ơi',
            'name.min' => 'Nhập họ tên ít nhất 2 ký tự',
            'name.max' => 'Họ tên gì mà dài quá thế',
            'name.regex' => 'Họ tên chỉ được phép chứa chữ cái và khoảng trắng',
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Nhập email chưa đúng',
            'email.ends_with' => 'Email phải có đuôi là @gmail.com',
            'dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
            'dien_thoai.min' => 'Số điện thoại phải ít nhất có 10 số',
            'dien_thoai.regex' => 'Số điện thoại chỉ được phép chứa số',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ nhà',
            'dia_chi.regex' => 'Địa chỉ chỉ được phép chứa chữ cái, số, dấu phẩy, dấu chấm và dấu gạch ngang'
       ];
     }

}
