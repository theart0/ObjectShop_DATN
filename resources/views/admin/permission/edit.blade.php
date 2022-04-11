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
                            <h5>Sửa quyền truy cập</h5>
                        </div>
                        <div class="card-body">
                            <h5>Biểu mẫu</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('permission.update',['id' => $item_permission->id]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên" name="name" value="{{ $item_permission->name }}">
                                        </div>
                                        <div class="form-group fill">
                                            <label for="exampleFormControlSelect1">Thể loại</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="resource_id">
                                                <option value="0">Resource</option>   
                                                @foreach ($list_permission as $item_permissions)
                                                    <option value="{{ $item_permissions->id }}" {{ $item_permission->parent_id == $item_permissions->id ? "selected" : "" }}>{{ $item_permissions->name }}</option>   
                                                @endforeach
                                            </select>
                                        </div>
                                        <a href="{{ route('permission.index') }}">
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
