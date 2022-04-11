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
                            <h5>Tạo mới sản phẩm</h5>
                        </div>
                        <div class="card-body">
                            <h5>Biểu mẫu</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giá gốc</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá gốc" name="price_origin">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giá hiện tại</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá hiện tại" name="price_current">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số lượng</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng" name="quantity">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Màu sắc</label>
                                            <select class="form-control js-example-tokenizer" multiple="multiple" name="colors[]">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kích thước</label>
                                            <select class="form-control js-example-tokenizer" multiple="multiple" name="sizes[]">
                                            </select>
                                        </div>
                                        <div class="form-group fill">
                                            <label for="exampleFormControlSelect1">Thể loại</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="category">
                                                @foreach ($list_category as $item_category)
                                                    <option value="{{ $item_category->id }}">{{ $item_category->name }}</option>   
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mô tả</label>
                                            <textarea name="desc" id="editor1" rows="10" cols="80">
                                                
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hình ảnh</label>
                                            <input type="file" class="form-control" id="inputImage" placeholder="Nhập tên" name="image">
                                        </div>
                                        <div class="form-group col-4">
                                            <img src="{{ asset('image_default/default_image.png') }}" class="img-thumbnail" id="outputImage">
                                        </div>
                                        <a href="{{ route('product.index') }}">
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
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
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
