@extends('admin.layouts.app')
@section('title',' Cập nhật bài viết  ')
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
            Cập nhật bài viết 
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Thunbar   </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="po_thunbar" id="imgInp">
                                            @if($errors->first('po_thunbar'))
                                                <span class="text-danger">{{ $errors->first('po_thunbar') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-10" style="margin-top: 10px;margin-left: 17%">
                                            <img src="" alt="" class="img img-responsive" id="blah" title=" Logo " style="width: 100%;height: 258px;border: 1px solid #dedede">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Danh mục </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="po_category_post_id">
                                                <option value=""> - Chọn danh mục  - </option>
                                                @if(count($sortCategoryPost) > 0)
                                                    @foreach($sortCategoryPost as $item)
                                                        <option value="{{ $item->id }}" {{ $post->po_category_post_id == $item->id ? "selected = 'selected'" : '' }}><?php for($i = 0; $i < $item->level; $i ++) echo '|--'; ?>{{ $item->cpo_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->first('po_category_post_id'))
                                                <span class="text-danger">{{ $errors->first('po_category_post_id') }}</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Tiêu đề </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="po_title" value="{{ $post->po_title }}"  placeholder="Tiêu đề bài viết không được quá 200 từ" autocomplete="off">
                                            @if($errors->first('po_title'))
                                                <span class="text-danger">{{ $errors->first('po_title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label" style="margin-bottom: 10px;"> Keywords </label>
                                        <div class="col-sm-10" style="margin-right: 0;margin-left: 0">
                                            <textarea name="po_keywords"  cols="10" rows="3" class="form-control" placeholder="Dùng để seo nội dung , không quá 100 ký tự">{{ $post->po_keywords }}</textarea>
                                            @if($errors->first('po_keywords'))
                                                <span class="text-danger">{{ $errors->first('po_keywords') }}</span>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label" style="margin-bottom: 10px;"> Description </label>
                                        <div class="col-sm-10" style="margin-right: 0;margin-left: 0">
                                            <textarea name="po_description"  cols="10" rows="3" class="form-control" placeholder=" Mô tả ngắn về nội dung bài viết , không quá 250 ký tự">{{ $post->po_description }}</textarea>
                                            @if($errors->first('po_description'))
                                                <span class="text-danger">{{ $errors->first('po_description') }}</span>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Tags bài viết </label>
                                        <div class="col-sm-10">
                                            <select class="locationMultiple form-control" name="po_tags[]"  multiple>
                                                <option value="1d4h7g"> html </option>
                                                <option value="1d4h7g"> css </option>
                                                <option value="1d4h7g"> js </option>
                                                <option value="1d4h7g">  bootstrap </option>
                                                <option value="1d4h7g">  laravel </option>
                                                <option value="1d4h7g">  custome </option>
                                                <option value="1d4h7g">  CI </option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label"> Hot </label>
                                        <div class="col-sm-4">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="po_hot" id="optionsRadios2" value="1" {{ $post->po_hot == 1 ? 'checked=""' : '' }} >
                                                    Có
                                                </label>
                                                <label>
                                                    <input type="radio" name="po_hot" id="optionsRadios1" value="0"  {{ $post->po_hot == 0 ? 'checked=""' : '' }}>
                                                    Không
                                                </label>
                                            </div>
                                        </div>
                                        <label for="" class="col-sm-2 control-label"> Active </label>
                                        <div class="col-sm-4">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="po_active" id="optionsRadios2" value="1" {{ $post->po_active == 1 ? 'checked=""' : '' }}>
                                                    Có
                                                </label>
                                                <label>
                                                    <input type="radio" name="po_active" id="optionsRadios1" value="0"  {{ $post->po_active == 0 ? 'checked=""' : '' }}>
                                                    Không
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Thứ tự hiển thị  </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="po_sort" value="{{ $post->po_sort }}" id="inputEmail3" placeholder=" Mặc định bằng 0" min="0" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group" style="margin:5px 0">
                                <label for="inputEmail3" class="col-sm-12 control-label" style="text-align: left;margin-bottom: 10px;padding-right: 30px;padding-left: 30px;"> Nội dung </label>
                                <div class="col-sm-12" style="padding-left: 30px ;padding-right: 30px">
                                    <textarea name="po_content" id="my-editor" cols="10" rows="10" class="form-control" placeholder=" Mời bạn nhập nội dung bài viết ">{{ $post->po_content }}</textarea>
                                    @if($errors->first('po_content'))
                                        <span class="text-danger">{{ $errors->first('po_content') }}</span>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- /.box-body -->
                            <div class="" style="position: fixed;right: 15px;top: 50%;transform: translateY(-50%);">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary btn-xs" style="width: 75px"> Save </button><br>
                                <a href=" {{ route('admin.posts.index') }}" class="btn btn-danger btn-xs" style="width: 75px"> Huỷ bỏ </a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
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

