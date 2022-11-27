@extends('admin.layouts.app')
@section('title',' Cập nhật email    ')
@section('main-content')
    <section class="content-header">
        <h1>
            Cập nhật email  
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.inc_left_email')
                <!-- /. box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    @include('admin.notification.index')
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Cấu hình gmail </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group clearfix">
                                <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;margin-top: 8px">Mail  Drive   </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control pull-right" name="e_drive" value="{{ $email->e_drive }}" autocomplete="off" value="{{ old('e_drive') }}" placeholder="smtp">
                                        <div class="input-group-addon">
                                            <i class="fa fa-globe" style="width: 14px;"></i>
                                        </div>
                                    </div>
                                    @if($errors->first('e_drive'))
                                        <span class="text-danger">{{ $errors->first('e_drive') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group clearfix" style="margin-top: 10px;">
                                <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;margin-top: 8px">Mail Host   </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control pull-right" name="e_host" autocomplete="off" value="{{ $email->e_host }}" placeholder="smtp.gmail.com">
                                        <div class="input-group-addon">
                                            <i class="fa fa-globe" style="width: 14px;"></i>
                                        </div>
                                    </div>
                                    @if($errors->first('e_host'))
                                        <span class="text-danger">{{ $errors->first('e_host') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group clearfix" style="margin-top: 10px;">
                                <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;margin-top: 8px">Mail Post   </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="number" class="form-control pull-right" name="e_post"  autocomplete="off" value="{{ $email->e_post }}" placeholder="456">
                                        <div class="input-group-addon">
                                            <i class="fa fa-globe" style="width: 14px;"></i>
                                        </div>
                                    </div>
                                    @if($errors->first('e_post'))
                                        <span class="text-danger">{{ $errors->first('e_post') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group clearfix" style="margin-top: 10px;">
                                <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;margin-top: 8px"> Username Email    </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="email" class="form-control pull-right" name="e_email" autocomplete="off" value="{{  $email->e_email }}" placeholder="admin@gmail.com">
                                        <div class="input-group-addon">
                                            <i class="fa fa-globe" style="width: 14px;"></i>
                                        </div>
                                    </div>
                                    @if($errors->first('e_email'))
                                        <span class="text-danger">{{ $errors->first('e_email') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group clearfix" style="margin-top: 10px;">
                                <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: right;margin-top: 8px"> Password    </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control pull-right" value="{{ $email->e_password }}" name="e_password"  autocomplete="off" placeholder="******">
                                        <div class="input-group-addon">
                                            <i class="fa fa-globe" style="width: 14px;"></i>
                                        </div>
                                    </div>
                                    @if($errors->first('e_password'))
                                        <span class="text-danger">{{ $errors->first('e_password') }}</span>
                                    @endif

                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="text-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-envelope-o"></i> Save </button>
                                <a href="{{ route('admin.gmail.index') }}" class="btn btn-xs btn-danger"> Huỷ bỏ </a>
                            </div>
                        </div>
                    </form>

                    <!-- /.box-footer -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection