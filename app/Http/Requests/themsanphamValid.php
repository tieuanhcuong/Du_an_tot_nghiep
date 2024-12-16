<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class themsanphamValid extends FormRequest{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'ten_sp' => ['required','min:2', 'max:30'], // Chỉ cho phép ký tự chữ và khoảng trắng
            'ngay' => 'required',
            'gia' => 'required',
            'gia_km' => 'required',// Chỉ cho phép ký tự số
            'id_loai' => 'required|not_in:-1', // Lỗi nếu không chọn loại
            'tinh_chat' => 'required|not_in:0',
            'hinh' => 'required|regex:/^images\//',
            'mo_ta' => 'required',
            'so_luong_con_lai' => 'required',
            'he_dieu_hanh' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'bo_nho' => 'required',
            'mau_sac' => 'required',
            'can_nang' => 'required',
            'do_phan_giai_man_hinh' => 'required',
            'tan_so_quet' => 'required',
            'camera_chinh' => 'required',
            'camera_phu' => 'required',
            'pin' => 'required',
            'cong_ket_noi' => 'required',
            'ket_noi_mang' => 'required'
            ];
    }
    public function messages() {
        return [
            'ten_sp.required' => 'Phải nhập họ tên nha bạn ơi',
            'ten_sp.min' => 'Nhập họ tên ít nhất 2 ký tự',
            'ten_sp.max' => 'Họ tên gì mà dài quá thế',
            'ngay.required' => 'Chưa chọn ngày',
            'gia.required' => 'Chưa nhập giá',
            'gia_km.required' => 'Chưa nhập giá khuyến mãi',
            'id_loai.required' => 'Chưa chọn loại',
            'id_loai.not_in' => 'Chưa chọn loại',
            'tinh_chat.required' => 'Chưa chọn tính chất',
            'tinh_chat.not_in' => 'Chưa chọn tính chất',
            'hinh.required' => 'Chưa chọn hình',
            'hinh.regex' => 'Phiền bạn chọn đường dẫn hình ảnh bắt đầu bằng "images/"',
            'mo_ta.required' => 'Chưa nhập mô tả',
            'so_luong_con_lai' => 'Chưa nhập tồn kho',
            'he_dieu_hanh' => 'Chưa nhập hệ điều hành',
            'cpu' => 'Chưa nhập cpu',
            'ram' => 'Chưa nhập ram',
            'bo_nho' => 'Chưa nhập bộ nhớ',
            'mau_sac' => 'Chưa nhập màu sắc',
            'can_nang' => 'Chưa nhập cân nặng',
            'do_phan_giai_man_hinh' => 'Chưa nhập độ phân giải màn hình',
            'tan_so_quet' => 'Chưa nhập tần số quét',
            'camera_chinh' => 'Chưa nhập camera chính',
            'camera_phu' => 'Chưa nhập camera phụ',
            'pin' => 'Chưa nhập pin',
            'cong_ket_noi' => 'Chưa nhập cổng kết nối',
            'ket_noi_mang' => 'Chưa nhập kết nối mạng',
         
       ];
     }

}
