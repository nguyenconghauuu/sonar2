@extends('admin.layouts.app')
@section('title',' Thông tin và cấu hình website  ')
@section('main-content')
     <section class="content-header">
        <h1>
            Thông tin && Cấu hình website
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            @include('admin.notification.index')
            <div class="box-body">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Logo   </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="logo" id="imgInp" value="{{ old('email') }}" id="inputEmail3" autocomplete="off">
                                            @if($errors->first('logo'))
                                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                                            @endif
                                        </div>
                                        @if(isset($settings->logo))
                                            <div class="col-sm-10" style="margin-top: 10px;margin-left: 17%">
                                                <img src="/uploads/{{ $settings->logo }}" alt="" class="img img-responsive" id="blah" title=" Logo " style="width: 100%;height: 258px;border: 1px solid #dedede">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Tên website  </label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control pull-right" name="name" value="{{ $settings->name ?? "" }}" autocomplete="off">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-globe" style="width: 14px;"></i>
                                                </div>
                                            </div>
                                            @if($errors->first('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Địa chỉ   </label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control pull-right" name="address" value="{{ $settings->address ?? "" }}" autocomplete="off">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-map-marker" style="width: 14px;"></i>
                                                </div>
                                            </div>
                                            @if($errors->first('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Số điện thoại  </label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control pull-right" name="phone" value="{{ $settings->phone ?? "" }}" autocomplete="off">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-mobile-phone" style="width: 14px;"></i>
                                                </div>
                                            </div>
                                            @if($errors->first('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Email   </label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="email" class="form-control pull-right" name="email" value="{{ $settings->email ?? "" }}" autocomplete="off">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                            </div>
                                            @if($errors->first('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Youtube   </label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control pull-right" name="youtube">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-youtube" style="width: 14px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Facebook   </label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control pull-right" name="facebook">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-facebook" style="width: 14px;"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <!-- /.box-body -->
                            <div class="box-footer col-sm-offset-5">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary btn-xs"> Cập nhật mới  </button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
