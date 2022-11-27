@extends('admin.layouts.app')
@section('title',' Thêm mới bộ đề thi')
@section('main-content')
    <section class="content-header">
        <h1>
            Thêm mới bộ đề thi
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
                                    <label class="col-sm-2 control-label"> Cấp độ </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="e_level">
                                            <option value="1"> - 1 - </option>
                                            <option value="2"> - 2 - </option>
                                            <option value="3"> - 3 - </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Mã đề </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="e_code" value="{{ old('e_code') }}" required id="inputEmail3" placeholder="" autocomplete="off">
                                        @if($errors->first('e_code'))
                                            <span class="text-danger">{{ $errors->first('e_code') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer col-sm-offset-2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary btn-xs"> Thêm mới </button>

                                <a href=" {{ route('choices.index') }}" class="btn btn-danger btn-xs"> Huỷ bỏ </a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection