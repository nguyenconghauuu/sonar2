@extends('admin.layouts.app')
@section('title',' Thêm mới slide và banner ảnh  ')
@section('main-content')
    <section class="content-header">
        <h1>
            Thêm mới slide và banner
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
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> Kiểu </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="type">
                                            <option value="2"> - Slide - </option>
                                            <option value="3"> - Banner - </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Tiêu đề </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="inputEmail3" placeholder="Website lien ket" autocomplete="off">
                                        @if($errors->first('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Link </label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" name="url" value="{{ old('url') }}" id="inputEmail3" placeholder="" autocomplete="off">
                                        @if($errors->first('url'))
                                            <span class="text-danger">{{ $errors->first('url') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Hình ảnh </label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="images" value="{{ old('images') }}" id="inputEmail3" placeholder="" autocomplete="off">
                                        @if($errors->first('images'))
                                            <span class="text-danger">{{ $errors->first('images') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer col-sm-offset-2">
                                {{--                                {{ csrf_field() }}--}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{--<input type="submit" class="btn btn-primary btn-xs" value="Thêm mới">--}}
                                <button type="submit" class="btn btn-primary btn-xs"> Thêm mới </button>

                                <a href=" {{ route('admin.slides.index') }}" class="btn btn-danger btn-xs"> Huỷ bỏ </a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection