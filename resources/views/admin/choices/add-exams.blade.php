@extends('admin.layouts.app')
@section('title',' Thêm mới bộ câu hỏi cho đề thi')
@section('main-content')
    <section class="content-header">
        <h1>
            Thêm mới bộ câu hỏi cho đề thi
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
                
            <div class="box-body">
                <div class="col-md-10 col-sm-offset-1">
                    <!-- Horizontal Form -->
                    @include('admin.notification.index')
                    <div class="box box-primary">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"> Chương  </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="chuong">
                                            @foreach($chuong as $ch)
                                                <option value="{{ $ch->id }}"> {{ $ch->cpo_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Phân loại  </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="phanloai">
                                            <option value="1"> K1 </option>
                                            <option value="2"> K2 </option>
                                            <option value="3"> K3 / K4 </option>
                                        </select>
                                    </div>
                                </div>
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
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Số câu hỏi </label>
                                    <div class="col-sm-10">
                                        <input type="number" min="1" class="form-control" name="socauhoi" value="1" required id="inputEmail3" placeholder="" autocomplete="off">
                                    </div>
                                </div>

                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer col-sm-offset-2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary btn-xs"> Bắt đầu tạo  </button>

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