<link href="/frontend/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/jquery.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body { padding-top:30px; }
    .form-control { margin-bottom: 10px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-sm-offset-4">
            <legend><a href=""><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
            <form action="" method="post" class="form" role="form">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" name="u_name" placeholder="Họ tên hiển thị" type="text" autofocus />
                        @if ($errors->has('u_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('u_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <input class="form-control" name="u_email" placeholder=" Email đăng nhập" type="email" />
                @if ($errors->has('u_email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('u_email') }}</strong>
                                    </span>
                @endif
                <input class="form-control" name="u_password" placeholder="Password đăng nhập" type="password" />
                @if ($errors->has('u_password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('u_password') }}</strong>
                                    </span>
                @endif
                <label class="radio-inline">
                    <input type="radio" name="u_sex" id="inlineCheckbox1" value="male" />
                    Nam
                </label>
                <label class="radio-inline">
                    <input type="radio" name="u_sex" id="inlineCheckbox2" value="female" />
                    Nữ
                </label>
                <br />
                <br />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Đăng Ký</button>
            </form>
        </div>
    </div>
</div>