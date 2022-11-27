@extends('admin.layouts.app')
@section('title',' Thêm mới danh mục bài viết ')
@section('main-content')
@section('main-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <style type="text/css">
        .select2-selection__choice { background-color: red !important ;border: 1px solid !important;}
        .select2-selection__choice__remove { color: white !important }
        #cke_37 { display: none !important }
    </style>
@endsection
    <section class="content-header">
        <h1>
            Thêm mới danh mục bài viết
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">

            <div class="box-body">
                <div class="col-md-10 col-sm-offset-1">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <form class="form-horizontal" action="" method="post" >
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Parent </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="cpo_parent_id">
                                            <option value="0"> - ROOT - </option>
                                            @if($sortCategory && count($sortCategory) > 0)
                                                @foreach($sortCategory as $item)
                                                    <option value="{{ $item->id }}"><?php for($i = 0; $i < $item->level; $i ++) echo '|--'; ?>{{ $item->cpo_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Tên danh mục </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="cpo_name" value="{{ old('cpo_name') }}" id="inputEmail3" placeholder="VD laravel" autocomplete="off">
                                        @if($errors->first('cpo_name'))
                                            <span class="text-danger">{{ $errors->first('cpo_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label"> Hot </label>
                                    <div class="col-sm-10">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="cpo_hot" id="optionsRadios2" value="1" >
                                                Có
                                            </label>
                                            <label>
                                                <input type="radio" name="cpo_hot" id="optionsRadios1" value="0" checked="" >
                                                Không
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Kiểu danh mục </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="cpo_type">
                                        <option value="1"> Kiểu 1 </option>
                                        <option value="2"> Kiểu 2 </option>
                                        <option value="3"> Kiểu 3 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Thứ tự hiển thị  </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="cpo_sort" value="{{ old('cpo_sort') }}" id="inputEmail3" placeholder=" Mặc định bằng 0" min="0" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group" style="margin:5px 0">
                                <label for="inputEmail3" class="col-sm-12 control-label" style="text-align: left;margin-bottom: 10px;padding-right: 30px;padding-left: 30px;"> Nội dung </label>
                                <div class="col-sm-12" style="padding-left: 30px ;padding-right: 30px">
                                    <textarea name="cpo_content" id="my-editor" cols="10" rows="10" class="form-control" placeholder=" Mời bạn nhập nội dung bài viết ">{{ old('cpo_content') }}</textarea>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer col-sm-offset-2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary btn-xs"> Thêm mới </button>

                                <a href=" {{ route('admin.categorypost.index') }}" class="btn btn-danger btn-xs"> Huỷ bỏ </a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('main-js')
    <!--https://select2.org/troubleshooting-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".locationMultiple").select2();
            $(".locationMultiple").find(".select2-selection__choice").addClass("btn btn-xs btn-danger");
            $(".select2-selection__choice").addClass("btn btn-xs btn-danger");
        });
        CKEDITOR.replace( 'my-editor', {
            height:'400px'
        });
    </script>
@endsection

