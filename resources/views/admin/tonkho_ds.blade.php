@extends('admin/layoutadmin')
@section('title') Danh sách tồn kho  @endsection
@section('noidungchinh')
<div class="container">
    <h1 class="mt-4">Danh sách tồn kho</h1>
    @if($tonKhoList->count() === 0 && request('search'))
        <div class="alert alert-warning">Không tìm thấy đơn hàng nào với từ khóa "{{ request('search') }}".</div>
    @endif
    <form method="GET" action="{{ route('admin.tonkho_ds') }}" class="mb-3">
        <div class="input-group mb-2">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo id hoặc tên sản phẩm..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="button" onclick="clearSearch()">x</button>
                <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </form>

    @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr class="text-center">
                <th>ID sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng còn lại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tonKhoList as $item)
                <tr>
                    <td>{{ $item->id_sp }}</td>
                    <td>{{ $item->ten_sp }}</td>
                    <td class="text-center">{{ $item->so_luong_con_lai }}</td>
                    <td class="text-center">
                        <!-- Thêm các nút để chỉnh sửa hoặc xóa tồn kho -->
                        <button class="btn btn-primary btn-sm" onclick="showAddStockForm({{ $item->id_sp }}, '{{ $item->ten_sp }}')">Thêm</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-2 d-flex justify-content-center">{{$tonKhoList->links() }}</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function clearSearch() {
    document.querySelector('input[name="search"]').value = ''; // Xóa nội dung ô tìm kiếm
    document.querySelector('form').submit(); // Gửi form để cập nhật danh sách
}

function showAddStockForm(productId, productName) {
    Swal.fire({
        title: 'Thêm tồn kho cho sản phẩm ' + productName,
        input: 'number',
        inputLabel: 'Số lượng thêm',
        inputAttributes: {
            min: 1,
            step: 1
        },
        inputValue: 1,
        showCancelButton: true,
        confirmButtonText: 'Thêm',
        cancelButtonText: 'Hủy',
        preConfirm: (quantity) => {
            // Kiểm tra xem người dùng có nhập số lượng hợp lệ hay không
            if (!quantity || quantity <= 0) {
                Swal.showValidationMessage('Vui lòng nhập số lượng hợp lệ');
                return false;
            }

            // Gửi yêu cầu lên server
            return fetch(`/admin/them-ton-kho/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ so_luong_them: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    return data.message; // Success message
                } else {
                    throw new Error(data.message || 'Có lỗi xảy ra!');
                }
            })
            .catch(error => {
                Swal.showValidationMessage(error.message);
                return false;
            });
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Thành công!', result.value, 'success').then(() => {
                location.reload(); // Reload trang sau khi nhấn "OK"
            });
        }
    });
}

</script>
@endsection