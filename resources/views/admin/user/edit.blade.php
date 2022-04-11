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
                            <h5>Sửa người dùng</h5>
                        </div>
                        <div class="card-body">
                            <h5>Biểu mẫu</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('user.update',['id' => $item_user->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên" name="name" value="{{ $item_user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số điện thoại</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại" name="phone" value="{{ $item_user->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ" name="address" value="{{ $item_user->address }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" name="email" value="{{ $item_user->email }}">
                                        </div>
                                        <div class="form-group ">
                                            <label for="exampleFormControlSelect1">Vai trò</label>
                                            <select class="js-example-basic-multiple col-12" name="roles[]" multiple="multiple">
                                                @foreach ($list_role as $item_role)
                                                    <option value="{{ $item_role->id }}" {{ $item_user->role->contains('id',$item_role->id) ? "selected" : "" }}>{{ $item_role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hình ảnh</label>
                                            <input type="file" class="form-control" id="inputImage" name="image">
                                        </div>
                                        <div class="form-group col-4">
                                            @if ( $item_user->image_path)
                                            <img src="{{ $item_user->image_path }}" class="img-thumbnail" id="outputImage">
                                            @else
                                            <img src="{{ asset('image_default/default_image.png') }}" class="img-thumbnail" id="outputImage">
                                                
                                            @endif
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
