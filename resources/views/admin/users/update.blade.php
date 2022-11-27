@extends('admin.layouts.app')
@section('title',' Cập nhật thành viên  ')
@section('main-content')

  
    <section class="content-header">
        <h1>
            Cập nhật thành viên 
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
             @include('admin.notification.index')
            <div class="box-body">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Avatar   </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="u_avatar" id="imgInp">
                                            @if($errors->first('u_avatar'))
                                                <span class="text-danger">{{ $errors->first('u_avatar') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-10" style="margin-top: 10px;margin-left: 17%">
                                            <img src="/uploads/users/{{ isset($user->u_avatar ) ?  $user->u_avatar : '' }}" alt="" class="img img-responsive" id="blah" title=" Logo " style="width: 100%;height: 258px;border: 1px solid #dedede">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                   
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Họ và Tên  </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="u_name" value="{{ $user->u_name }}"  placeholder=" Ví dụ : Nguyễn Văn A" autocomplete="off">
                                            @if($errors->first('u_name'))
                                                <span class="text-danger">{{ $errors->first('u_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Email  </label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="u_email" value="{{ $user->u_email }}"  placeholder=" admin@gmail.com " autocomplete="off">
                                            @if($errors->first('u_email'))
                                                <span class="text-danger">{{ $errors->first('u_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Mật Khẩu   </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="u_password" value="{{  old('u_password') }}"  placeholder=" ****** " autocomplete="off">
                                            @if($errors->first('u_password'))
                                                <span class="text-danger">{{ $errors->first('u_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Xác nhận    </label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="u_repassword" value="{{ old('u_repassword') }}"  placeholder=" xác  mật khẩu giống với mật khẩu ở trên  " autocomplete="off">
                                            @if($errors->first('u_repassword'))
                                                <span class="text-danger">{{ $errors->first('u_repassword') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Phone  </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="u_phone" value="{{ $user->u_phone }}"  placeholder=" 0986.420.994" autocomplete="off">
                                            @if($errors->first('u_phone'))
                                                <span class="text-danger">{{ $errors->first('u_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Address  </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="u_address" value="{{ $user->u_address }}"  placeholder=" Quận Đống Đa- Hà Nội " autocomplete="off">
                                            @if($errors->first('u_address'))
                                                <span class="text-danger">{{ $errors->first('u_address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Age  </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="u_age" value="{{ $user->u_age }}"  placeholder=" 24 " autocomplete="off">
                                            @if($errors->first('u_age'))
                                                <span class="text-danger">{{ $errors->first('u_age') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.box-body -->
                            <div class="text-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary btn-xs" style="width: 75px;display: inline;"> Cập nhật  </button>
                                <a href=" {{ route('admin.users.index') }}" class="btn btn-danger btn-xs" style="width: 75px"> Huỷ bỏ </a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
            </div>
        </div>
    </section>

@endsection

