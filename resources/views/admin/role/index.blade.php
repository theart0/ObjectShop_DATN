@extends('admin.layout')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Thông số thống kê hệ thống</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Trang chủ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-3">Vai trò</h5>
                        <br>
                        <a href="{{ route('role.create') }}">
                            <button type="button" class="btn  btn-success">Thêm mới</button>
                        </a>
                        <span class="d-block m-t-5">Danh sách vai trò</span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_role as $item_role)
                                    <tr class="item_role{{ $item_role->id }}">
                                        <td>{{ $item_role->id }}</td>
                                        <td>{{ $item_role->name }}</td>
                                        <td>
                                            <a href="{{ route('role.edit',['id' => $item_role->id]) }}">
                                                <button type="button" class="btn  btn-primary">Sửa</button>

                                            </a>
                                            <button type="button" class="btn  btn-danger btn_delete-role" data-id="{{ $item_role->id }}" data-url="{{ route('role.delete',['id' => $item_role->id]) }}">Xóa</button>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{$list_role->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
@section('js')
    <script>
        function delete_role() {
            var url = $(this).data('url');
            var id = $(this).data('id');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa không ?',
                text: "Bạn có muốn hoàn tác không !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa !'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $('.item_role' + id).remove();
                            Swal.fire(
                                'Xóa!',
                                'Bạn đã xóa.',
                                'Thành công'
                            )
                        }
                    })
                }
            })
        }
        $(function() {
            $(document).on('click', '.btn_delete-role', delete_role)
        })
    </script>
@endsection