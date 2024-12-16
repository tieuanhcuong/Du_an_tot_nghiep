<?php
namespace App\Http\Controllers;

use App\Mail\Dangky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Support\Arr;
use App\Models\TinTuc;
use App\Models\binh_luan;
use App\Models\Danh_Gia;
use App\Models\don_hang;
use App\Models\don_hang_chi_tiet;
use App\Models\khuyen_mai;
use App\Models\loai;
use App\Models\User;
use App\Models\san_pham;
use App\Models\so_luong_ton_kho;
use App\Models\thuoc_tinh;
use Carbon\Carbon;

class SanphamController extends Controller
{
    public function __construct() {
        $loai_arr = DB::table('loai')->where('an_hien',1 )->orderBy('thu_tu')->get();
        View::share( 'loai_arr', $loai_arr  );
    }   
    function index(){
        $today = Carbon::now();

        $spluotmuanhieu_arr = DB::table('san_pham as sp')
        ->select(
            'sp.id',
            'sp.ten_sp',
            'sp.hinh',
            'sp.gia_km',
            'sp.luot_xem'
        )->where('sp.an_hien', 1) // Chỉ lấy sản phẩm đang hiển thị
        ->where('sp.hot', 1) // Chỉ lấy sản phẩm hot
        ->orderBy('sp.luot_xem', 'desc') // Sắp xếp theo lượt xem
        ->orderBy('sp.ngay', 'desc') // Sắp xếp theo ngày
        ->get();
    
        $sl_mua_arr = DB::table('don_hang_chi_tiet as dhct')
        ->select(
            'dhct.id_sp', // ID của sản phẩm
            DB::raw('SUM(dhct.so_luong) as sl_mua') // Tổng số lượng bán của từng sản phẩm
        )
        ->join('don_hang as dh', 'dh.id', '=', 'dhct.id_dh') // Join với bảng đơn hàng
        ->where('dh.trang_thai', '!=', 2) // Loại trừ đơn hàng đã hủy
        ->where('dh.trang_thai', '!=', 7) // Loại trừ đơn hàng hoàn tất
        ->groupBy('dhct.id_sp') // Nhóm theo ID sản phẩm
        ->get();

        
        $spluotmuanhieu_arr = $spluotmuanhieu_arr->map(function ($sp) use ($sl_mua_arr) {
            // Tìm số lượt mua của sản phẩm
            $sl_mua = $sl_mua_arr->firstWhere('id_sp', $sp->id);
            
            // Nếu không có lượt mua (sản phẩm chưa có đơn hàng), gán sl_mua = 0
            $sp->sl_mua = $sl_mua ? $sl_mua->sl_mua : 0;
            
            return $sp;
        });
        $spluotmuanhieu_arr = $spluotmuanhieu_arr->take(8);
        
        $spluotmuanhieu_arr = $spluotmuanhieu_arr->sortByDesc('sl_mua');
    

        // if ($spluotmuanhieu_arr->isEmpty()) {
        //     // Nếu không có sản phẩm có lượt mua, xóa session
        //     session()->forget('spluotmuanhieu_arr');
        // }


        $spnoibat_arr = DB::table('san_pham as sp')
        ->select(
            'sp.id', 
            'sp.ten_sp', 
            'sp.hinh', 
            'sp.gia_km', 
            'sp.luot_xem', 
        )
        ->where('sp.an_hien', 1)
        ->where('sp.hot', 1)
        ->groupBy('sp.id', 'sp.ten_sp', 'sp.hinh', 'sp.gia_km', 'sp.luot_xem') // Nhóm theo các trường trong bảng san_pham
        ->orderBy('sp.luot_xem', 'desc')
        ->orderBy('sp.ngay', 'desc')
        ->get();

        $spnoibat_arr = $spnoibat_arr->map(function ($sp) use ($sl_mua_arr) {
            // Tìm số lượt mua của sản phẩm
            $sl_mua = $sl_mua_arr->firstWhere('id_sp', $sp->id);
        
            // Nếu không có lượt mua (sản phẩm chưa có đơn hàng), gán sl_mua = 0
            $sp->sl_mua = $sl_mua ? $sl_mua->sl_mua : 0;
        
            return $sp;
        });
        $spnoibat_arr = $spnoibat_arr->take(8);

       
    
       
    //    $spgiamsoc_arr = DB::table('san_pham')
    //     ->where('an_hien', 1)
    //     ->where('tinh_chat', 2)
    //     ->orderBy('ngay','desc')
    //     ->limit(8)->get();  

    //    $spgiare_arr = DB::table('san_pham')
    //     ->where('an_hien', 1)
    //     ->where('tinh_chat', 1)
    //     ->orderBy('gia_km', 'asc')
    //     ->orderBy('ngay','desc')
    //     ->limit(8)->get();  

        $spluotxemcao_arr = DB::table('san_pham as sp')
        ->select(
            'sp.id', 
            'sp.ten_sp', 
            'sp.hinh', 
            'sp.gia_km', 
            'sp.luot_xem', 
        )
        ->where('sp.an_hien', 1)
        ->groupBy('sp.id', 'sp.ten_sp', 'sp.hinh', 'sp.gia_km', 'sp.luot_xem') // Nhóm theo các trường trong bảng san_pham
        ->orderBy('sp.luot_xem', 'desc')
        ->orderBy('sp.ngay', 'desc')
        ->get();

        $spluotxemcao_arr = $spluotxemcao_arr->map(function ($sp) use ($sl_mua_arr) {
            // Tìm số lượt mua của sản phẩm
            $sl_mua = $sl_mua_arr->firstWhere('id_sp', $sp->id);
        
            // Nếu không có lượt mua (sản phẩm chưa có đơn hàng), gán sl_mua = 0
            $sp->sl_mua = $sl_mua ? $sl_mua->sl_mua : 0;
        
            return $sp;
        });
        $spluotxemcao_arr = $spluotxemcao_arr->take(8);
        

        $tinTucs = TinTuc::orderBy('ngay_dang', 'desc')->limit(3)->get();
   

        return view ('user.trangchu.home' , compact(['spluotmuanhieu_arr','spnoibat_arr', 'spluotxemcao_arr', 'tinTucs']));

    }
    function chitiet($id = 0){
        $sp = DB::table('san_pham as sp')
        ->select(
            'sp.id', 
        'sp.ten_sp', 
        'sp.hinh', 
        'sp.gia', 
        'sp.gia_km', 
        'sp.luot_xem', 
        'sp.ngay', 
        'sp.id_loai',  // Các trường cần được nhóm theo
        'sp.tinh_chat',
        'sp.an_hien',  
        )
        ->where('sp.id', '=', $id)  // Lọc theo id sản phẩm
        ->first();
    
        $sl_mua_arr = DB::table('don_hang_chi_tiet as dhct')
        ->select(
            'dhct.id_sp', // ID của sản phẩm
            DB::raw('SUM(dhct.so_luong) as sl_mua') // Tổng số lượng bán của từng sản phẩm
        )
        ->join('don_hang as dh', 'dh.id', '=', 'dhct.id_dh') // Join với bảng đơn hàng
        ->where('dh.trang_thai', '!=', 2) // Loại trừ đơn hàng đã hủy
        ->where('dh.trang_thai', '!=', 7) // Loại trừ đơn hàng hoàn tất
        ->groupBy('dhct.id_sp') // Nhóm theo ID sản phẩm
        ->get();

        // Tìm số lượt mua của sản phẩm từ danh sách lượt mua
        $sl_mua = $sl_mua_arr->firstWhere('id_sp', $sp->id);

        // Nếu không có lượt mua (sản phẩm chưa có đơn hàng), gán sl_mua = 0
        $sp->sl_mua = $sl_mua ? $sl_mua->sl_mua : 0;



        $lt = DB::table('loai')->where('id', $sp->id_loai)->first();
        
        if ($sp == null || $sp->an_hien == 0) {
            return back()->with(['thongbao' => 'Không có sản phẩm này hoặc sản phẩm đang ẩn.']);
        }
        DB::table('san_pham')
        ->where('id', '=', $id)
        ->increment('luot_xem', 1);

        // Lấy số lượt mua
        // $luotMua = san_pham::find($id)->totalSales();

        $tonkho = so_luong_ton_kho::where('id_sp', $id)->first();
      
        $thuoc_tinh = thuoc_tinh::where('id_sp', $id)->first();
        
        $danh_gia_arr = Danh_Gia::with('user') // Chắc chắn rằng quan hệ user đã được thiết lập trong model Danh_Gia
        ->where('id_sp', $id)
        ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo
        ->get();
        $reviewCount = $danh_gia_arr->count();

        $splienquan_arr = DB::table('san_pham as sp')
        ->select(
            'sp.id', 
            'sp.ten_sp', 
            'sp.hinh', 
            'sp.gia_km', 
            'sp.luot_xem', 
            DB::raw('IFNULL(SUM(dhct.so_luong), 0) as sl_mua')  // Đếm số lần sản phẩm được mua từ don_hang_chi_tiet
        )
        ->leftJoin('don_hang_chi_tiet as dhct', 'sp.id', '=', 'dhct.id_sp')  // Join với bảng don_hang_chi_tiet theo id_sp
        
        ->where('sp.id_loai', $sp->id_loai)  // Lọc theo loại sản phẩm giống sản phẩm hiện tại
        ->where('sp.tinh_chat', $sp->tinh_chat)  // Lọc theo tính chất sản phẩm giống sản phẩm hiện tại
        ->where('sp.an_hien', 1)  // Chỉ lấy sản phẩm đang hiển thị
        ->groupBy('sp.id', 'sp.ten_sp', 'sp.hinh', 'sp.gia_km', 'sp.luot_xem')  // Nhóm theo các trường trong bảng san_pham
        ->orderBy('sp.luot_xem', 'desc')  // Sắp xếp theo lượt xem
        ->orderBy('sp.ngay', 'desc')  // Sắp xếp theo ngày (nếu cần)
        ->limit(4)  // Giới hạn 4 sản phẩm liên quan
        ->get()
        ->except($id);  // Loại bỏ sản phẩm hiện tại khỏi danh sách sản phẩm liên quan



        $binh_luan_arr = binh_luan::with('replies')  // Dùng with để lấy bình luận trả lời
        ->where('id_sp', $id)
        ->orderBy('thoi_diem','asc')
        ->get();

        return view('user.sanpham.chitiet',compact(['sp', 'lt', 'thuoc_tinh', 'splienquan_arr','danh_gia_arr', 'reviewCount', 'binh_luan_arr', 'tonkho']));
    }
    
    
    function sptrongloai(Request $request, $slug){
        $per_page= env('PER_PAGE'); //9

         // Lấy tham số lọc từ request
        $gia_km = $request->input('gia_km');
        $ram = $request->input('ram');
        $bo_nho = $request->input('bo_nho');
        $mau_sac = $request->input('mau_sac');
        $camera_chinh = $request->input('camera_chinh');
        $pin = $request->input('pin');
        // $cpu = $request->input('cpu');
        $sort = $request->input('sort');
        $search_product = $request->input('search_product');

        $loai = DB::table('loai')->where('slug', $slug)->first();

        if (!$loai) {
            return redirect()->route('home')->with('thongbao', 'Loại sản phẩm không tồn tại');
        }
    
        $id_loai = $loai->id; // Lấy ID từ loại (slug đã được chuyển thành ID)
        
        $query = san_pham::where('an_hien', '=', 1)->where('id_loai', $id_loai);

        if ($search_product) {
            // Nếu có tham số search_product, chỉ tìm kiếm sản phẩm trùng với ID đó
            $query->where('id', $search_product);
        }

        if ($gia_km) {
            [$min, $max] = explode('-', $gia_km); // Tách giá thành min và max
            $query->whereBetween('gia_km', [(int)$min, (int)$max]);
        }

        if ($ram) {
            $query->whereHas('thuoc_tinh', function ($q) use ($ram) {
                $q->where('ram', $ram);
            });
        }
        if ($bo_nho) {
            $query->whereHas('thuoc_tinh', function ($q) use ($bo_nho) {
                $q->where('bo_nho', $bo_nho);
            });
        }
        if ($mau_sac) {
            $query->whereHas('thuoc_tinh', function ($q) use ($mau_sac) {
                $q->where('mau_sac', $mau_sac);
            });
        }
        if ($camera_chinh) {
            $query->whereHas('thuoc_tinh', function ($q) use ($camera_chinh) {
                $q->where('camera_chinh', $camera_chinh);
            });
        }
        if ($pin) {
            $query->whereHas('thuoc_tinh', function ($q) use ($pin) {
                $q->where('pin', $pin);
            });
        }

        // if ($cpu) {
        //     $query->whereHas('thuoc_tinh', function ($q) use ($cpu) {
        //         $q->where('cpu', $cpu);
        //     });
        // }

        if ($sort === 'asc') {
            $query->orderBy('gia_km', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('gia_km', 'desc');
        } elseif ($sort == 'views_desc') {
            $query->orderBy('luot_xem', 'desc');
        }

        $sptrongloai_arr = $query->paginate($per_page)->withQueryString();
        $ten_loai = DB::table('loai')->where ('id', $id_loai)->value('ten_loai');

        $noProducts = $sptrongloai_arr->isEmpty();
        
        return view ('user.sanpham.sptrongloai', compact(['id_loai','slug', 'ten_loai', 'sptrongloai_arr', 'noProducts']));
    }
    public function luubinhluan($id_user)
    {
        $arr = request()->post(); 
        $id_sp = Arr::get($arr, 'id_sp', '-1');
        $noi_dung = Arr::get($arr, 'noi_dung', '');
        $parent_id = Arr::get($arr, 'parent_id', null);
    
        if ($id_sp <= -1) {
            return response()->json(['error' => "Không biết sản phẩm $id_sp"], 400);
        }
        if ($noi_dung == "") {
            return response()->json(['error' => 'Nội dung không có'], 400);
        }
    
        $binhLuan = binh_luan::create([
            'id_user' => $id_user,
            'id_sp' => $id_sp,
            'noi_dung' => $noi_dung,
            'thoi_diem' => now(),
            'parent_id' => $parent_id,
        ]);
    
        return response()->json([
            'user_name' => $binhLuan->user->name,
            'thoi_diem' => gmdate('d/m/Y H:i:s', strtotime($binhLuan->thoi_diem) + 3600 * 7),
            'noi_dung' => $binhLuan->noi_dung,
            'parent_id' => $parent_id,
        ]);
    }
    

    function themvaogio(Request $request, $id_sp = 0, $soluong = 1)
    {
    // Lấy thông tin sản phẩm
    $product = san_pham::find($id_sp);
    
    // Kiểm tra xem sản phẩm có tồn tại không
    if (!$product) {
        return response()->json(['error' => 'Sản phẩm không tồn tại.'], 404);
    }

    // Kiểm tra số lượng tồn kho
    $tonkho = so_luong_ton_kho::where('id_sp', $id_sp)->first();
    if (!$tonkho || $tonkho->so_luong_con_lai <= 0) {
        return response()->json(['error' => 'Sản phẩm này đã hết hàng.'], 400);
    }

    // Lấy giỏ hàng từ session hoặc khởi tạo là mảng rỗng nếu không có
    $cart = $request->session()->get('cart', []);

    // Đảm bảo $cart là một mảng
    if (!is_array($cart)) {
        $cart = [];
    }

    // Tìm chỉ số của sản phẩm trong giỏ hàng
    $index = array_search($id_sp, array_column($cart, 'id_sp'));

     if ($index !== false) { // Nếu sản phẩm đã có trong giỏ hàng
        // Cập nhật số lượng
        $newQuantity = $cart[$index]['soluong'] + $soluong;

        // Kiểm tra số lượng tồn kho
        if ($newQuantity > $tonkho->so_luong_con_lai) {
            return response()->json(['error' => 'Không đủ hàng trong kho.'], 400);
        }

        $cart[$index]['soluong'] = $newQuantity;
    } else { // Nếu sản phẩm chưa có trong giỏ hàng
        if ($soluong > $tonkho->so_luong_con_lai) {
            return response()->json(['error' => 'Không đủ hàng trong kho.'], 400);
        }

        $cart[] = ['id_sp' => $id_sp, 'soluong' => $soluong];
    }

    // Cập nhật giỏ hàng trong session
    $request->session()->put('cart', $cart);

     // Trả về phản hồi JSON
     return response()->json([
        'status' => 'success',
        'message' => 'Sản phẩm đã được thêm vào giỏ hàng thành công.',
        'cart_count' => count($cart) // Trả về số lượng sản phẩm trong giỏ hàng
    ]);

    // return back()->with('thongbaothem','Thêm sản phẩm vào giỏ hàng thành công');
    }

    function hiengiohang(Request $request ){
        $cart =  $request->session()->get('cart');
        $tongtien = 0;   
        $tongsoluong=0;
        
         // Lấy thông tin khách hàng từ session
    $customerInfo = $request->session()->get('customer_info', []);

        if($cart){
            for ( $i=0; $i<count($cart) ; $i++) {
              $sp = $cart[$i]; // $sp = [ 'id_sp' =>100, 'soluong'=>4, ]
              $ten_sp = DB::table('san_pham')->where('id', $sp['id_sp'] )->value('ten_sp');
              $gia_km = DB::table('san_pham')->where('id', $sp['id_sp'] )->value('gia_km');
              $hinh = DB::table('san_pham')->where('id', $sp['id_sp'] )->value('hinh');
              $thanhtien = $gia_km*$sp['soluong'];
              $tongsoluong+=$sp['soluong'];
              $tongtien += $thanhtien;
          
              $sp['ten_sp'] = $ten_sp;
              $sp['gia'] = $gia_km;
              $sp['hinh'] = $hinh;
              $sp['thanhtien'] = $thanhtien;
              $cart[$i] = $sp;
            }
            $request->session()->put('cart', $cart);
            return view('user.donhang.hiengiohang', compact(['cart', 'tongsoluong','tongtien']));
        }else{
            $cart=[];
            return view('user.donhang.hiengiohang', compact(['cart', 'tongsoluong','tongtien']));
        }

    }

    public function timKiem(Request $request, $id_loai = 0)
    {
        $per_page= env('PER_PAGE',); //12

        // Lấy giá trị tìm kiếm từ request
        $search = $request->input('search');
    
        // Kiểm tra nếu người dùng không nhập gì
        if (trim($search) === '') {
            return back();
        }
    
        // Kiểm tra nếu có loại sản phẩm trùng với từ khóa tìm kiếm
        $loai = loai::where('ten_loai', 'like', "%{$search}%")->first();
    
        if ($loai) {
            return redirect()->route('sanpham.loai', ['slug' => $loai->slug]);
        }
    
        // Tìm tất cả sản phẩm có tên giống từ khóa tìm kiếm (sử dụng get() thay vì paginate())
        $sptrongloai_arr = san_pham::where('ten_sp', 'like', "%{$search}%")
                                    ->orWhere('mo_ta', 'like', "%{$search}%")
                                    ->paginate($per_page)->withQueryString(); // Sử dụng get() thay vì paginate()
    
        // Kiểm tra nếu không có sản phẩm nào
        $noProducts = $sptrongloai_arr->isEmpty();
    
        // Trả về view với tất cả các sản phẩm tìm được
        return view('user.sanpham.timkiem', compact('id_loai', 'sptrongloai_arr', 'search', 'noProducts'));
    }


//     public function timKiem(Request $request, $id_loai = 0)
// {
//     $per_page = env('PER_PAGE', 12); // Mặc định là 12

//     // Lấy giá trị tìm kiếm từ request
//     $search = $request->input('search');
    
//     // Kiểm tra nếu người dùng không nhập gì
//     if (trim($search) === '') {
//         return back();
//     }

//     // Kiểm tra nếu có loại sản phẩm trùng với từ khóa tìm kiếm
//     $loai = loai::where('ten_loai', 'like', "%{$search}%")->first();

//     if ($loai) {
//         return redirect()->route('sanpham.loai', ['slug' => $loai->slug]);
//     }

//     // Lọc sản phẩm theo các tham số
//     $query = san_pham::where('ten_sp', 'like', "%{$search}%")
//                      ->orWhere('mo_ta', 'like', "%{$search}%");

//     // Áp dụng các bộ lọc
//     if ($request->has('ram') && $request->ram != '') {
//         $query->where('ram', $request->ram);
//     }

//     if ($request->has('bo_nho') && $request->bo_nho != '') {
//         $query->where('bo_nho', $request->bo_nho);
//     }

//     if ($request->has('mau_sac') && $request->mau_sac != '') {
//         $query->where('mau_sac', $request->mau_sac);
//     }

//     if ($request->has('camera_chinh') && $request->camera_chinh != '') {
//         $query->where('camera_chinh', $request->camera_chinh);
//     }

//     if ($request->has('pin') && $request->pin != '') {
//         $query->where('pin', $request->pin);
//     }

//     // Lọc theo khoảng giá
//     if ($request->has('gia_km') && $request->gia_km != '') {
//         list($min_price, $max_price) = explode('-', $request->gia_km);
//         $query->whereBetween('gia_km', [(int)$min_price, (int)$max_price]);
//     }

//     // Sắp xếp theo giá hoặc lượt xem
//     if ($request->has('sort')) {
//         if ($request->sort == 'asc') {
//             $query->orderBy('gia_km', 'asc');
//         } elseif ($request->sort == 'desc') {
//             $query->orderBy('gia_km', 'desc');
//         } elseif ($request->sort == 'views_desc') {
//             $query->orderBy('luot_xem', 'desc');
//         }
//     }

//     // Lấy kết quả tìm kiếm
//     $sptrongloai_arr = $query->paginate($per_page)->withQueryString();
    
//     // Kiểm tra nếu không có sản phẩm nào
//     $noProducts = $sptrongloai_arr->isEmpty();

//     // Trả về view với tất cả các sản phẩm tìm được
//     return view('user.sanpham.timkiem', compact('id_loai', 'sptrongloai_arr', 'search', 'noProducts'));
// }


    





    function download(){ return view("download"); }

}
