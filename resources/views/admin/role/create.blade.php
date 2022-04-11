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
                <!-- [ form-element ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tạo mới vai trò</h5>
                        </div>
                        <div class="card-body">
                            <h5>Biểu mẫu</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('role.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên" name="name">
                                        </div>
                                        <div class="form-group checkbox_wrapper">
                                            <label for="exampleInputEmail1">Gán quyền truy cập</label>
                                            <div class="card ">
                                                <div class="card-header mb-4"><div>
                                                    <div class="form-check col" >
                                                        <input type="checkbox" class="form-check-input checkAll" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Tất cả các quyền</label>
                                                    </div>
                                                </div>
                                            </div>

                                            @foreach ($list_permission_parent as $item_permission_parent)
                                                <div class="card resource_parent">
                                                    <div class="card-header"><div>
                                                        <div class="form-check col" >
                                                            <input type="checkbox" class="form-check-input resource" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">{{ $item_permission_parent->name }}</label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="card-body row">
                                                        <div class="ml-2 row col-12">
                                                            @foreach ($item_permission_parent->permission as $item_permission)
                                                                <div class="form-check col" >
                                                                    <input type="checkbox" class="form-check-input permission" id="exampleCheck1" name="permissions[]" value="{{ $item_permission->id }}">
                                                                    <label class="form-check-label" for="exampleCheck1">{{ $item_permission->name }}</label>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            @endforeach
                                            
                                        </div>
                                        
                                        <a href="{{ route('role.index') }}">
                                            <div class="btn  btn-secondary">Thoát</div>
                                        </a>
                                        <button type="submit" class="btn  btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ form-element ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection
@section('js')
<script>
    function resourceCheckAll(){
       $(this).parents('.resource_parent').find('.permission').prop('checked', this.checked);
    }
    function CheckAll(){
       $(this).parents('.checkbox_wrapper').find('.resource').prop('checked', this.checked);
       $(this).parents('.checkbox_wrapper').find('.permission').prop('checked', this.checked);
    }
    $(function(){
        $(document).on('click','.resource',resourceCheckAll)
        $(document).on('click','.checkAll',CheckAll)
    })
</script>
    
@endsection
