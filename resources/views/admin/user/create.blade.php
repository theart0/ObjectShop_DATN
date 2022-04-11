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
                            <h5>Tạo mới người dùng</h5>
                        </div>
                        <div class="card-body">
                            <h5>Biểu mẫu</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số điện thoại</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ" name="address">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" name="email">
                                        </div>
                                        <div class="form-group ">
                                            <label for="exampleFormControlSelect1">Vai trò</label>
                                            <select class="js-example-basic-multiple col-12" name="roles[]" multiple="multiple">
                                                @foreach ($list_role as $item_role)
                                                    <option value="{{ $item_role->id }}">{{ $item_role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mật khẩu</label>
                                            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                                            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Nhập lại mật khẩu" name="password2">
                                        </div>
                                        @if (session()->get('message'))
                                            <div class="alert alert-warning" role="alert">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hình ảnh</label>
                                            <input type="file" class="form-control" id="inputImage" placeholder="Nhập tên" name="image">
                                        </div>
                                        <div class="form-group col-4">
                                            <img src="{{ asset('image_default/default_image.png') }}" class="img-thumbnail" id="outputImage">
                                        </div>
                                        <a href="{{ route('user.index') }}">
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
         $('.js-example-basic-multiple').select2({ 
            placeholder: 'This is my placeholder',
            allowClear: true
        });
        function previewImage(event){
            var output = document.getElementById('outputImage');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }}

    $(function(){
        $(document).on('change','#inputImage',previewImage)
    })
    </script>
@endsection
